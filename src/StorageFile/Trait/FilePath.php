<?php

namespace LaravelFile\StorageFile\Trait;

/**
 * Storageに保存されているファイルのPathを管理する
 * 
 * @package LaravelFile\StorageFile\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 */
trait FilePath
{
    /**
     * ファイルを読み込むパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    abstract protected function loadPath(string $dirName, string $baseName): string;

    /**
     * ファイルを保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    abstract protected function createPath(string $dirName, string $baseName): string;

    /**
     * storage/appディレクトリからの相対パス
     * 
     * @return string
     */
    public function filePath(): string
    {
        return $this->dirName() . DIRECTORY_SEPARATOR . $this->baseName();
    }

    /**
     * ファイルの絶対パス
     * 
     * @return string
     */
    public function storagePath(): string
    {
        return storage_path("app" . DIRECTORY_SEPARATOR . $this->filePath());
    }

    /**
     * publicディレクトリにあるファイルの絶対パス
     * 
     * @return string
     */
    public function publicPath(): string
    {
        return public_path("storage" . DIRECTORY_SEPARATOR . $this->filePath());
    }

    /**
     * publicディレクトリにアクセスする為のURL
     * 
     * @return string
     */
    public function assetUrl(): string
    {
        return asset("storage" . DIRECTORY_SEPARATOR . $this->filePath());
    }
}
