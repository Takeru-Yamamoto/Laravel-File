<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;
use Intervention\Image\Facades\Image as FacadeImage;


/**
 * Storage配下のImageファイルを扱うクラスのコンストラクタを管理する
 * StorageFile::__construct()で呼び出す
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 */
trait ChildConstructor
{
    /**
     * Imageファイルのインスタンス
     *
     * @var Image
     */
    private Image $file;


    /**
     * ファイルを読み込むパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function loadPath(string $dirName, string $baseName): string
    {
        return storage_path("app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName);
    }

    /**
     * 継承先クラスのコンストラクタ
     * StorageFileのコンストラクタで呼び出す
     *
     * @return void
     */
    protected function childConstruct(): void
    {
        $this->file = FacadeImage::make($this->loadPath($this->dirName(), $this->baseName()));
    }
}
