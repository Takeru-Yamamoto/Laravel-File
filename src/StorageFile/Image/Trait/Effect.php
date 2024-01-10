<?php

namespace LaravelFile\StorageFile\Image\Trait;

use Intervention\Image\Image;

/**
 * Imageファイルの効果に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 */
trait Effect
{
    /**
     * 画像の明るさを変更する
     * 
     * @param int $level
     * @return static
     */
    public function brightness(int $level): static
    {
        $this->file = $this->file->brightness($level);

        return $this;
    }

    /**
     * 画像のコントラストを変更する
     * 
     * @param int $level
     * @return static
     */
    public function contrast(int $level): static
    {
        $this->file = $this->file->contrast($level);

        return $this;
    }

    /**
     * 画像にガンマ補正をする
     *
     * @param float $gamma
     * @return static
     */
    public function gamma(float $gamma): static
    {
        $this->file = $this->file->gamma($gamma);

        return $this;
    }

    /**
     * 画像の色調を変更する
     * 
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return static
     */
    public function colorize(int $red = 0, int $green = 0, int $blue = 0): static
    {
        $this->file = $this->file->colorize($red, $green, $blue);

        return $this;
    }

    /**
     * 画像を水平反転する
     *
     * @return static
     */
    public function flip(): static
    {
        $this->file = $this->file->flip();

        return $this;
    }

    /**
     * 画像を垂直反転する
     *
     * @return static
     */
    public function flop(): static
    {
        $this->file = $this->file->flop();

        return $this;
    }

    /**
     * 画像をぼかす
     * 
     * @param int $amount
     * @return static
     */
    public function blur(int $amount = 5): static
    {
        $this->file = $this->file->blur($amount);

        return $this;
    }

    /**
     * 画像を鮮明にする
     *
     * @param int $amount
     * @return static
     */
    public function sharpen(int $amount = 10): static
    {
        $this->file = $this->file->sharpen($amount);

        return $this;
    }

    /**
     * 画像の色を反転させる
     *
     * @return static
     */
    public function colorInvert(): static
    {
        $this->file = $this->file->invert();

        return $this;
    }

    /**
     * 画像にモザイク処理をする
     * 
     * @param int $size
     * @return static
     */
    public function pixelate(int $size): static
    {
        $this->file = $this->file->pixelate($size);

        return $this;
    }

    /**
     * 画像をモノクロにする
     *
     * @return static
     */
    public function greyScale(): static
    {
        $this->file = $this->file->greyscale();

        return $this;
    }
}
