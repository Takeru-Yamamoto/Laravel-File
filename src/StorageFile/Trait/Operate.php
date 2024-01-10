<?php

namespace LaravelFile\StorageFile\Trait;

use LaravelFile\StorageFile\Interface\StorageFileInterface;
use LaravelFile\Facade\File;

use Illuminate\Support\Facades\Storage;

/**
 * Storageに保存されているファイルの操作を管理する
 * 
 * @package LaravelFile\StorageFile\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 * 
 * @method string filePath()
 */
trait Operate
{
    /**
     * 引数を元に新しいインスタンスを生成する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    protected function getNewInstance(string $dirName, string $baseName): StorageFileInterface
    {
        return File::storage($dirName, $baseName);
    }

    /**
     * ファイルを保存する
     * 各StorageFileで実態を定義する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    abstract public function create(string $dirName, string $baseName): StorageFileInterface;

    /**
     * ファイルを上書き保存する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function save(): StorageFileInterface
    {
        return $this->create($this->dirName(), $this->baseName());
    }

    /**
     * ファイルを別名で保存する
     *
     * @param string $registerName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function saveAs(string $registerName): StorageFileInterface
    {
        return $this->create($this->dirName(), $registerName);
    }

    /**
     * ファイルを削除する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function delete(): StorageFileInterface
    {
        Storage::delete($this->filePath());
        return $this;
    }

    /**
     * ファイルを移動する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function move(string $dirName, string $baseName): StorageFileInterface
    {
        $new = $this->create($dirName, $baseName);

        $this->delete();

        return $new;
    }

    /**
     * ファイルを別名で移動する
     *
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveAs(string $baseName): StorageFileInterface
    {
        return $this->move($this->dirName(), $baseName);
    }

    /**
     * ファイルを別ディレクトリに移動する
     *
     * @param string $dirName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveDirectory(string $dirName): StorageFileInterface
    {
        return $this->move($dirName, $this->baseName());
    }

    /**
     * ファイルをディレクトリ内のtmpディレクトリに移動する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveToTmp(): StorageFileInterface
    {
        return $this->moveDirectory($this->dirName() . DIRECTORY_SEPARATOR . "tmp");
    }

    /**
     * ファイルをディレクトリ内のtmpディレクトリから移動する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveFromTmp(): StorageFileInterface
    {
        return $this->moveDirectory(str_replace(DIRECTORY_SEPARATOR . "tmp", "", $this->dirName()));
    }
}
