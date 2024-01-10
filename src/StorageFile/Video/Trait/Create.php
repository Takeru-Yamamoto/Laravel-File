<?php

namespace LaravelFile\StorageFile\Video\Trait;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;

/**
 * Storage配下のVideoファイルを扱うクラスの保存処理を管理する
 * 
 * @package LaravelFile\StorageFile\Video\Trait
 * 
 * @method MediaExporter getExporter()
 * @method \LaravelFile\StorageFile\Interface\StorageFileInterface getNewInstance(string $dirName, string $baseName)
 */
trait Create
{
    /**
     * ファイルを保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function createPath(string $dirName, string $baseName): string
    {
        return storage_path("app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName);
    }

    /**
     * ファイルを一時保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function createTemporaryPath(string $dirName, string $baseName): string
    {
        return "app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR . $baseName;
    }

    /**
     * ファイルを保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function storageTemporaryPath(string $dirName, string $baseName): string
    {
        return storage_path("app" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . "tmp" . $dirName . DIRECTORY_SEPARATOR . $baseName);
    }

    /**
     * Videoファイルを保存する
     * StorageFileでabstract宣言されているメソッド
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function create(string $dirName, string $baseName): StorageFileInterface
    {
        // エクスポーターを取得する
        $exporter = $this->getExporter();

        // 直接上書きができないため、一時ファイルに保存する
        $exporter->save($this->createTemporaryPath($dirName, $baseName));

        // 一時ファイルをStorageに移動する
        rename($this->storageTemporaryPath($dirName, $baseName), $this->createPath($dirName, $baseName));

        return $this->getNewInstance($dirName, $baseName);
    }
}
