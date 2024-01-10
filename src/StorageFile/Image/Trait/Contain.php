<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Image\Enum\PositionEnum;

use Intervention\Image\Image;

/**
 * Imageファイルのサイズ変更とパディングを組み合わせた処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 * 
 * @method int width()
 * @method int height()
 */
trait Contain
{
    /**
     * 画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function contain(int $width, int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->contain($width, $height, $background, $position);

        return $this;
    }

    /**
     * 垂直方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function containVertical(int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->contain($this->width(), $height, $background, $position);
    }

    /**
     * 水平方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function containHorizontal(int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->contain($width, $this->height(), $background, $position);
    }

    /**
     * 元のサイズを超えないように画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function pad(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->pad($width, $height, $position);

        return $this;
    }

    /**
     * 元のサイズを超えないように垂直方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function padVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->pad($this->width(), $height, $position);
    }

    /**
     * 元のサイズを超えないように水平方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function padHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->pad($width, $this->height(), $position);
    }
}
