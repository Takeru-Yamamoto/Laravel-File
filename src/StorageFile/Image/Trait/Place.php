<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Image\Enum\PositionEnum;

use Intervention\Image\Image;
use Intervention\Image\Facades\Image as FacadeImage;
use Intervention\Image\Interface\ImageInterface;

/**
 * Imageファイルを重ねる処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 * 
 * @method string loadPath(string $dirName, string $baseName)
 */
trait Place
{
    /**
     * 画像を重ねる
     * 
     * @param \Intervention\Image\Interface\ImageInterface $image
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @param int $x
     * @param int $y
     * @return static
     */
    public function place(ImageInterface $image, PositionEnum|string $position = PositionEnum::TOP_LEFT, int $x = 0, int $y = 0): static
    {
        if ($position instanceof PositionEnum) $position = $position->value;

        $this->file = $this->file->place($image, $position, $x, $y);

        return $this;
    }

    /**
     * Storage配下の画像ファイルを重ねる
     * 
     * @param string $dirName
     * @param string $baseName
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @param int $x
     * @param int $y
     * @return static
     */
    public function placeFromStorage(string $dirName, string $baseName, PositionEnum|string $position = PositionEnum::TOP_LEFT, int $x = 0, int $y = 0): static
    {
        $watermark = FacadeImage::make($this->loadPath($dirName, $baseName));

        return $this->place($watermark, $position, $x, $y);
    }
}
