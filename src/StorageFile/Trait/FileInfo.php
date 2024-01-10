<?php

namespace LaravelFile\StorageFile\Trait;

use Illuminate\Support\Facades\Storage;

/**
 * Storageに保存されているファイルの情報を管理する
 * 
 * @package LaravelFile\StorageFile\Trait
 * 
 * @property-read string $dirName
 * @property-read string $baseName
 * 
 * @method string filePath()
 * @method string storagePath()
 */
trait FileInfo
{
    /**
     * ファイルが存在するディレクトリパスを取得する
     * 
     * @return string
     */
    public function dirName(): string
    {
        return $this->dirName;
    }

    /**
     * ファイル名を取得する
     * 
     * @return string
     */
    public function baseName(): string
    {
        return $this->baseName;
    }

    /**
     * 拡張子を取得する
     * 
     * @return string
     */
    public function extension(): string
    {
        $pathinfo = pathinfo($this->storagePath());

        return $pathinfo["extension"];
    }

    /**
     * 拡張子を含まないファイル名を取得する
     * 
     * @return string
     */
    public function fileName(): string
    {
        $pathinfo = pathinfo($this->storagePath());

        return $pathinfo["filename"];
    }

    /**
     * ファイルのサイズを取得する
     * 
     * @return int
     */
    public function size(): int
    {
        return Storage::size($this->filePath());
    }

    /**
     * ファイルのMIMEタイプを取得する
     * 
     * @return string
     */
    public function mimeType(): string
    {
        return Storage::mimeType($this->filePath());
    }
}
