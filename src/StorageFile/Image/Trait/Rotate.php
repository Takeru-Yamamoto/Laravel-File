<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;

/**
 * Imageファイルの回転に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait Rotate
{
    /**
     * 画像を回転する
     *
     * @param float $angle
     * @param mixed $bgcolor
     * @return static
     */
    public function rotate(float $angle, mixed $bgcolor = null): static
    {
        $this->file = $this->file->rotate($angle, $bgcolor);

        return $this;
    }

    /**
     * 画像を90度回転する
     *
     * @return static
     */
    public function rotate90(): static
    {
        return $this->rotate(90);
    }

    /**
     * 画像を180度回転する
     *
     * @return static
     */
    public function rotate180(): static
    {
        return $this->rotate(180);
    }

    /**
     * 画像を270度回転する
     *
     * @return static
     */
    public function rotate270(): static
    {
        return $this->rotate(270);
    }
}
