<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Image\Enum\PositionEnum;

use Intervention\Image\Image;

/**
 * Imageファイルのトリミングとサイズ変更を組み合わせた処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 * 
 * @method int width()
 * @method int height()
 */
trait Cover
{
    /**
     * 画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cover(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->cover($width, $height, $position);

        return $this;
    }

    /**
     * 垂直方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->cover($this->width(), $height, $position);
    }

    /**
     * 水平方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->cover($width, $this->height(), $position);
    }

    /**
     * 元のサイズを超えないように画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDown(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->coverDown($width, $height, $position);

        return $this;
    }

    /**
     * 元のサイズを超えないように垂直方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDownVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->coverDown($this->width(), $height, $position);
    }

    /**
     * 元のサイズを超えないように水平方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDownHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->coverDown($width, $this->height(), $position);
    }
}
