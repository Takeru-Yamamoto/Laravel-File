<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Image\Enum\PositionEnum;

use Intervention\Image\Image;

/**
 * Imageファイルのトリミング処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 * 
 * @method int width()
 * @method int height()
 */
trait Crop
{
    /**
     * 画像をトリミングする
     *
     * @param int $width
     * @param int $height
     * @param int $x
     * @param int $y
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function crop(int $width, int $height, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->crop($width, $height, $x, $y, $position);

        return $this;
    }

    /**
     * 画像の幅を維持したままをトリミングする
     *
     * @param int $height
     * @param int $x
     * @param int $y
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cropVertical(int $height, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static
    {
        return $this->crop($this->width(), $height, $x, $y, $position);
    }

    /**
     * 画像の高さを維持したままをトリミングする
     *
     * @param int $width
     * @param int $x
     * @param int $y
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cropHorizontal(int $width, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static
    {
        return $this->crop($width, $this->height(), $x, $y, $position);
    }
}
