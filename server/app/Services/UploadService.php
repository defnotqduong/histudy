<?php

namespace App\Services;

use App\Helpers\DiskHelper;
use Illuminate\Http\UploadedFile;
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\X264;
use FFMpeg\Format\Audio\AAC;

class UploadService
{

    public function multipartUploaderToS3(string $folder, UploadedFile $file): array
    {
        $initial = [
            'status' => false,
            'fileName' => '',
            'filePath' => ''
        ];

        if ($file) {
            $fileName = $this->getFileName($file);
            $path = $folder . '/' . $fileName;
            $contents = fopen($file, 'rb');

            $awsConfig = config('services.aws');

            $s3 = new S3Client([
                'version' => 'latest',
                'region'  => $awsConfig['region'],
                'credentials' => [
                    'key'    => $awsConfig['access_key_id'],
                    'secret' => $awsConfig['secret_access_key'],
                ],
            ]);

            $uploader = new MultipartUploader($s3, $contents, [
                'bucket' => $awsConfig['bucket'],
                'key'    => $path,
                'ContentType' => $file->getMimeType(),
            ]);

            try {
                $result = $uploader->upload();
                $initial = [
                    'status' => true,
                    'fileName' => $fileName,
                    'filePath' => $result['ObjectURL'],
                ];
                return $initial;
            } catch (MultipartUploadException $e) {
                $initial['message'] = 'Failed to upload file';
            } catch (AwsException $e) {
                $initial['message'] = 'AWS error: ' . $e->getMessage();
            }
        }

        return $initial;
    }

    public function upLoadObjectToS3(string $folder, UploadedFile $file)
    {

        if ($file) {

            $fileName = $this->getFileName($file);

            $initial = [
                'status' => false,
                'fileName' => '',
                'filePath' => ''
            ];

            $path = $folder  . '/' . $fileName;

            DiskHelper::getS3Disk()->put($path, file_get_contents($file), [
                'ContentType' => $file->getMimeType(),
            ]);

            $initial = [
                'status' => true,
                'fileName' => $fileName,
                'filePath' => $this->getObjectUrlFromS3($path),
            ];
        }
        return $initial;
    }

    public function uploadVideoToS3(string $folder, UploadedFile $file): array
    {
        try {

            $fileContents = file_get_contents($file->getRealPath());


            $tempStream = fopen('php://memory', 'r+');
            fwrite($tempStream, $fileContents);
            rewind($tempStream);

            $convertedHLSFiles = $this->convertMp4ToHlsFromStream($tempStream, $folder);

            $uploadedFiles = [];
            foreach ($convertedHLSFiles as $convertedFile) {
                $uploadResult = $this->upLoadObjectToS3($folder, $convertedFile);
                if ($uploadResult['status']) {
                    $uploadedFiles[] = $uploadResult['filePath'];
                }
            }

            if (empty($uploadedFiles)) {
                return [
                    'status' => false,
                    'message' => 'No files were uploaded.'
                ];
            }

            return [
                'status' => true,
                'uploadedFiles' => $uploadedFiles
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ];
        }
    }


    public function getObjectUrlFromS3(string|array $pathFile): string|array
    {
        $initial = [
            'status' => true,
            'filePath' => null
        ];
        if (empty($pathFile)) {
            return '';
        }
        if (is_array($pathFile)) {
            $arrPathExist = [];
            foreach ($pathFile as $item) {
                if (DiskHelper::getS3Disk()->exists($item)) {
                    $arrPathExist[] = DiskHelper::getS3Disk()->url($item);
                }
            }

            if (!empty($arrPathExist)) {
                $initial['filePath'] = $arrPathExist;
                return $initial;
            }
        }
        if (is_string($pathFile) && DiskHelper::getS3Disk()->exists($pathFile)) {
            $url = DiskHelper::getS3Disk()->url($pathFile);
            $initial['filePath'] = $url;
            return $initial['filePath'];
        }
    }

    public function deleteObjectS3(string|array $pathFile): array
    {
        $path = parse_url($pathFile, PHP_URL_PATH);

        $pathFile = ltrim($path, '/');

        $initial = [
            'status' => false,
        ];
        if (empty($pathFile)) {
            return $initial;
        }
        if (is_array($pathFile)) {
            $arrPathExist = [];
            foreach ($pathFile as $item) {
                if (DiskHelper::getS3Disk()->exists($item)) {
                    $arrPathExist[] = $item;
                }
            }
            if (!empty($arrPathExist)) {
                $data = DiskHelper::getS3Disk()->delete($arrPathExist);
                $initial['status'] = $data;
            }
        }
        if (is_string($pathFile) && (DiskHelper::getS3Disk()->exists($pathFile))) {
            $data = DiskHelper::getS3Disk()->delete($pathFile);
            $initial['status'] = $data;
        }

        return $initial;
    }

    private function getFileName(UploadedFile $objectFile): string
    {
        $originName = $objectFile->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $objectFile->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        return $fileName;
    }

    private function convertMp4ToHlsFromStream($inputStream, string $outputFolder): array
    {
        try {
            $outputHLSFiles = [];

            $outputStream = fopen('php://temp', 'r+');

            FFMpeg::fromStream($inputStream)
                ->exportForHLS()
                ->setSegmentLength(10)
                ->setPlaylistLength(0)
                ->setAudioCodec('aac')
                ->setVideoCodec('libx264')
                ->setResolution('1280x720')
                ->setBitrate(1000)
                ->saveToStream($outputStream);

            rewind($outputStream);

            $filePaths = [];
            while ($line = fgets($outputStream)) {
                $filePaths[] = $line;
            }


            foreach ($filePaths as $filePath) {

                $convertedFile = new UploadedFile($filePath, basename($filePath), mime_content_type($filePath), null, true);
                $uploadResult = $this->multipartUploaderToS3($outputFolder, $convertedFile);

                if ($uploadResult['status']) {
                    $outputHLSFiles[] = $uploadResult['filePath'];
                }
            }

            return $outputHLSFiles;
        } catch (\Exception $e) {
            throw new \Exception('Failed to convert MP4 to HLS: ' . $e->getMessage());
        }
    }
}
