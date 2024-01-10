<?php

namespace LaravelFile\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * HttpのFacade
 * FileManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package LaravelFile\Facade
 * 
 * @method static \LaravelFile\RequestFile\Interface\RequestFileInterface|array request(\Illuminate\Http\UploadedFile|array $files)
 * @method static \LaravelFile\StorageFile\Interface\StorageFileInterface|array upload(\Illuminate\Http\UploadedFile|array $files, string $dirName, string $registerName = null, bool $isAllowOverwriting = false)
 * 
 * @method static \LaravelFile\StorageFile\Interface\StorageFileInterface storage(string $dirName, string $baseName)
 * 
 * @see \LaravelFile\Interface\ManagerInterface
 */
class File extends Facade
{
    /** 
     * FileManagerにアクセスするためのFacadeの名前を取得する
     * 
     * @return string 
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
