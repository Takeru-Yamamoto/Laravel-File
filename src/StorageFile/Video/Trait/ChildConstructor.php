<?php

namespace LaravelFile\StorageFile\Video\Trait;

use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

/**
 * Storage配下のVideoファイルを扱うクラスのコンストラクタを管理する
 * StorageFile::__construct()で呼び出す
 * 
 * @package LaravelFile\StorageFile\Video\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 */
trait ChildConstructor
{
    /**
     * Videoファイルのインスタンス
     *
     * @var MediaOpener
     */
    private MediaOpener $file;


    /**
     * ファイルを読み込むパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function loadPath(string $dirName, string $baseName): string
    {
        return "app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName;
    }

    /**
     * 継承先クラスのコンストラクタ
     * StorageFileのコンストラクタで呼び出す
     *
     * @return void
     */
    protected function childConstruct(): void
    {
        $this->file = FFMpeg::open($this->loadPath($this->dirName(), $this->baseName()));
    }
}
