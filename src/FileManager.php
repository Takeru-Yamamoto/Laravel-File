<?php

namespace LaravelFile;

use LaravelFile\Interface\ManagerInterface;

use LaravelFile\RequestFile\Interface\RequestFileInterface;
use LaravelFile\RequestFile\RequestFile;

use LaravelFile\StorageFile\Interface\StorageFileInterface;
use LaravelFile\StorageFile;

use LaravelFile\Enum\FileTypeEnum;

use Illuminate\Http\UploadedFile;

/**
 * Facadeを経由してstaticにアクセスされるManager
 * 
 * @package LaravelFile
 */
class FileManager implements ManagerInterface
{
    /*----------------------------------------*
     * Request 
     *----------------------------------------*/

    /**
     * リクエストからファイルを取得する
     *
     * @param UploadedFile|array<int, UploadedFile> $files
     * @return \LaravelFile\RequestFile\Interface\RequestFileInterface|array<int, RequestFileInterface>
     */
    public function request(UploadedFile|array $files): RequestFileInterface|array
    {
        $requestFiles = [];

        if ($files instanceof UploadedFile) return new RequestFile($files);

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) $requestFiles[] = new RequestFile($file);
        }

        return $requestFiles;
    }

    /**
     * リクエストからファイルをアップロードする
     *
     * @param UploadedFile|array<int, UploadedFile> $files
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface|array<int, StorageFileInterface>
     */
    public function upload(UploadedFile|array $files, string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface
    {
        $storageFiles = [];

        $requestFiles = $this->request($files);

        if ($requestFiles instanceof RequestFileInterface) return $requestFiles->upload($dirName, $registerName, $isAllowOverwriting);

        foreach ($requestFiles as $requestFile) {
            if ($requestFile instanceof UploadedFile) $storageFiles[] = $requestFile->upload($dirName, $registerName, $isAllowOverwriting);
        }

        return $storageFiles;
    }



    /*----------------------------------------*
     * Storage 
     *----------------------------------------*/

    /**
     * Storageからファイルを取得する
     *
     * @param string $dirName
     * @param string $baseName
     * @throws \RuntimeException
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function storage(string $dirName, string $baseName): StorageFileInterface
    {
        $storageFile = match (FileTypeEnum::tryFromStorage($dirName, $baseName)) {
            FileTypeEnum::IMAGE => new StorageFiles\Image\Image($dirName, $baseName),
            FileTypeEnum::VIDEO => new StorageFiles\Video\Video($dirName, $baseName),
            FileTypeEnum::CSV   => new StorageFiles\Csv\Csv($dirName, $baseName),
            FileTypeEnum::EXCEL => new StorageFiles\Excel\Excel($dirName, $baseName),

            default             => null
        };

        if (!$storageFile instanceof StorageFileInterface) throw new \RuntimeException("Storage file not supported");

        return $storageFile;
    }
}
