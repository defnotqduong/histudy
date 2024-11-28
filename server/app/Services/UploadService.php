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
use Illuminate\Support\Str;

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

    public function getFileFromS3(string $url): string|false
    {
        $path = parse_url($url, PHP_URL_PATH);

        $pathFile = ltrim($path, '/');

        if (DiskHelper::getS3Disk()->exists($pathFile)) {
            return DiskHelper::getS3Disk()->get($pathFile);
        }

        return false;
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

    public function convertMp4ToHlsAndUpload(string $sourceKey): array
    {
        try {
            $uniqueFilename = Str::random(7);
            $timestamp = now()->format('YmdHis');
            $playLink = "hls/{$uniqueFilename}/{$timestamp}.m3u8";

            FFMpeg::fromDisk('s3')
                ->open($sourceKey)
                ->exportForHLS()
                ->toDisk('s3')
                ->addFormat((new X264)->setKiloBitrate(144), function ($media) {
                    $media->scale(192, 144);
                })
                ->addFormat((new X264)->setKiloBitrate(240), function ($media) {
                    $media->scale(320, 240);
                })
                ->addFormat((new X264)->setKiloBitrate(360), function ($media) {
                    $media->scale(480, 360);
                })
                ->addFormat((new X264)->setKiloBitrate(480), function ($media) {
                    $media->scale(640, 480);
                })
                ->addFormat((new X264)->setKiloBitrate(720), function ($media) {
                    $media->scale(1280, 720);
                })
                ->addFormat((new X264)->setKiloBitrate(1080), function ($media) {
                    $media->scale(1920, 1080);
                })
                ->save($playLink);


            $playUrl = DiskHelper::getS3Disk()->url($playLink);

            return [
                'status' => true,
                'playUrl' => $playUrl,
                'uploadedFiles' => [$playLink],
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Error during HLS conversion: ' . $e->getMessage(),
            ];
        }
    }
}
