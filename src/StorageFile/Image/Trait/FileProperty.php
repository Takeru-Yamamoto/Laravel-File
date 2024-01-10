<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;

/**
 * Imageファイルのプロパティに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait FileProperty
{
    /**
     * Imageファイルの幅を取得する
     *
     * @return int
     */
    public function width(): int
    {
        return $this->file->width();
    }

    /**
     * Imageファイルの高さを取得する
     *
     * @return int
     */
    public function height(): int
    {
        return $this->file->height();
    }
}
