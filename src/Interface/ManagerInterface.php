<?php

namespace LaravelFile\Interface;

use LaravelFile\RequestFile\Interface\RequestFileInterface;
use LaravelFile\StorageFile\Interface\StorageFileInterface;

use Illuminate\Http\UploadedFile;

/**
 * LaravelHttpのManagerのInterface
 * 
 * @package LaravelHttp\Interface
 */
interface ManagerInterface
{
    /*----------------------------------------*
     * Request 
     *----------------------------------------*/

    /**
     * リクエストからファイルを取得する
     *
     * @param UploadedFile|array<int, UploadedFile> $files
     * @return RequestFileInterface|array<int, RequestFileInterface>
     */
    public function request(UploadedFile|array $files): RequestFileInterface|array;

    /**
     * リクエストからファイルをアップロードする
     *
     * @param UploadedFile|array<int, UploadedFile> $files
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return StorageFileInterface|array<int, StorageFileInterface>
     */
    public function upload(UploadedFile|array $files, string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface|array;



    /*----------------------------------------*
     * Storage 
     *----------------------------------------*/

     /**
      * Storageからファイルを取得する
      *
      * @param string $dirName
      * @param string $baseName
      * @return StorageFileInterface
      */
     public function storage(string $dirName, string $baseName): StorageFileInterface;
}
