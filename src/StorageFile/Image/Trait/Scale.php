<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;

/**
 * Imageファイルの拡大縮小に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait Scale
{
    /**
     * 画像のアスペクト比を維持したままサイズを変更する
     *
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function scale(?int $width, ?int $height): static
    {
        $this->file = $this->file->scale($width, $height);

        return $this;
    }

    /**
     * 画像のアスペクト比を維持したまま垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function scaleVertical(int $height): static
    {
        return $this->scale(null, $height);
    }

    /**
     * 画像のアスペクト比を維持したまま水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function scaleHorizontal(int $width): static
    {
        return $this->scale($width, null);
    }

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないようにサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function scaleDown(?int $width, ?int $height): static
    {
        $this->file = $this->file->scaleDown($width, $height);

        return $this;
    }

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないように垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function scaleDownVertical(int $height): static
    {
        return $this->scaleDown(null, $height);
    }

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないように水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function scaleDownHorizontal(int $width): static
    {
        return $this->scaleDown($width, null);
    }
}
