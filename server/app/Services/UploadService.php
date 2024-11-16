<?php

namespace App\Services;

use App\Helpers\DiskHelper;
use Illuminate\Http\UploadedFile;
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;

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

            $s3 = new S3Client([
                'version' => 'latest',
                'region'  => env('AWS_DEFAULT_REGION'),
                'credentials' => [
                    'key'    => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                ],
            ]);

            $uploader = new MultipartUploader($s3, $contents, [
                'bucket' => 'histudy-2024-bucket-s3',
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
            return $initial;
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
}
