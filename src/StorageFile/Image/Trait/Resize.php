<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;

/**
 * Imageファイルのリサイズに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait Resize
{
    /**
     * 画像のサイズを変更する
     *
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function resize(?int $width, ?int $height): static
    {
        $this->file = $this->file->resize($width, $height);

        return $this;
    }

    /**
     * 画像の垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function resizeVertical(int $height): static
    {
        return $this->resize(null, $height);
    }

    /**
     * 画像の水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function resizeHorizontal(int $width): static
    {
        return $this->resize($width, null);
    }

    /**
     * 画像を元のサイズを超えないようにサイズ変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function resizeDown(?int $width, ?int $height): static
    {
        $this->file = $this->file->resizeDown($width, $height);

        return $this;
    }

    /**
     * 画像を元のサイズを超えないように垂直方向のサイズ変更する
     * 
     * @param int $height
     * @return static
     */
    public function resizeDownVertical(int $height): static
    {
        return $this->resizeDown(null, $height);
    }

    /**
     * 画像を元のサイズを超えないように水平方向のサイズ変更する
     * 
     * @param int $width
     * @return static
     */
    public function resizeDownHorizontal(int $width): static
    {
        return $this->resizeDown($width, null);
    }
}
