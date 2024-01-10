<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Image\Enum\PositionEnum;

use Intervention\Image\Image;

/**
 * Imageファイルのキャンバスのサイズを変更する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait ResizeCanvas
{
    /**
     * 画像のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvas(?int $width, ?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->resizeCanvas($width, $height, $background, $position);

        return $this;
    }

    /**
     * 画像の垂直方向のキャンバスサイズを変更する
     * 
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasVertical(?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->resizeCanvas(null, $height, $background, $position);
    }

    /**
     * 画像の水平方向のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasHorizontal(?int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->resizeCanvas($width, null, $background, $position);
    }

    /**
     * 元のサイズを基準として画像のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelative(?int $width, ?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->resizeCanvasRelative($width, $height, $background, $position);

        return $this;
    }

    /**
     * 元のサイズを基準として画像の垂直方向のキャンバスサイズを変更する
     * 
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelativeVertical(?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->resizeCanvasRelative(null, $height, $background, $position);
    }

    /**
     * 元のサイズを基準として画像の水平方向のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelativeHorizontal(?int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static
    {
        return $this->resizeCanvasRelative($width, null, $background, $position);
    }
}
