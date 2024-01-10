<?php

namespace LaravelFile\StorageFile\Image\Interface;

use LaravelFile\StorageFile\Interface\StorageFileInterface;
use LaravelFile\StorageFile\Image\Enum\PositionEnum;

/**
 * Storage配下のImageファイルを扱うクラスのInterface
 * 
 * @package LaravelFile\StorageFile\Image\Interface
 */
interface ImageInterface extends StorageFileInterface
{
    /*----------------------------------------*
     * Create 
     *----------------------------------------*/

    /**
     * ImageファイルをJPG形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeJpeg(int $quality = 100, string $extension = "jpg"): StorageFileInterface;

    /**
     * ImageファイルをPNG形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodePng(string $extension = "png"): StorageFileInterface;

    /**
     * ImageファイルをGIF形式に変換し、保存する
     *
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeGif(string $extension = "gif"): StorageFileInterface;

    /**
     * ImageファイルをWEBP形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeWebp(int $quality = 100, string $extension = "webp"): StorageFileInterface;

    /**
     * ImageファイルをBMP形式に変換し、保存する
     *
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeBmp(string $extension = "bmp"): StorageFileInterface;

    /**
     * ImageファイルをAVIF形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeAvif(int $quality = 100, string $extension = "avif"): StorageFileInterface;



    /*----------------------------------------*
     * File Property
     *----------------------------------------*/

    /**
     * Imageファイルの幅を取得する
     *
     * @return int
     */
    public function width(): int;

    /**
     * Imageファイルの高さを取得する
     *
     * @return int
     */
    public function height(): int;



    /*----------------------------------------*
     * Resize
     *----------------------------------------*/

    /**
     * 画像のサイズを変更する
     *
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function resize(?int $width, ?int $height): static;

    /**
     * 画像の垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function resizeVertical(int $height): static;

    /**
     * 画像の水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function resizeHorizontal(int $width): static;

    /**
     * 画像を元のサイズを超えないようにサイズ変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function resizeDown(?int $width, ?int $height): static;

    /**
     * 画像を元のサイズを超えないように垂直方向のサイズ変更する
     * 
     * @param int $height
     * @return static
     */
    public function resizeDownVertical(int $height): static;

    /**
     * 画像を元のサイズを超えないように水平方向のサイズ変更する
     * 
     * @param int $width
     * @return static
     */
    public function resizeDownHorizontal(int $width): static;



    /*----------------------------------------*
     * Scale
     *----------------------------------------*/

    /**
     * 画像のアスペクト比を維持したままサイズを変更する
     *
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function scale(?int $width, ?int $height): static;

    /**
     * 画像のアスペクト比を維持したまま垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function scaleVertical(int $height): static;

    /**
     * 画像のアスペクト比を維持したまま水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function scaleHorizontal(int $width): static;

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないようにサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @return static
     */
    public function scaleDown(?int $width, ?int $height): static;

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないように垂直方向のサイズを変更する
     *
     * @param int $height
     * @return static
     */
    public function scaleDownVertical(int $height): static;

    /**
     * 画像のアスペクト比を維持したまま元のサイズを超えないように水平方向のサイズを変更する
     *
     * @param int $width
     * @return static
     */
    public function scaleDownHorizontal(int $width): static;



    /*----------------------------------------*
     * Cover
     *----------------------------------------*/

    /**
     * 画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cover(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 垂直方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 水平方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDown(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように垂直方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDownVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように水平方向の画像のトリミングとサイズ変更を組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function coverDownHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static;



    /*----------------------------------------*
     * Contain
     *----------------------------------------*/

    /**
     * 画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function contain(int $width, int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 垂直方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function containVertical(int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 水平方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function containHorizontal(int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function pad(int $width, int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように垂直方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $height
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function padVertical(int $height, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを超えないように水平方向の画像のサイズ変更とパディングを組み合わせて行う
     *
     * @param int $width
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function padHorizontal(int $width, PositionEnum|string $position = PositionEnum::CENTER): static;



    /*----------------------------------------*
     * Crop
     *----------------------------------------*/

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
    public function crop(int $width, int $height, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static;

    /**
     * 画像の幅を維持したままをトリミングする
     *
     * @param int $height
     * @param int $x
     * @param int $y
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cropVertical(int $height, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static;

    /**
     * 画像の高さを維持したままをトリミングする
     *
     * @param int $width
     * @param int $x
     * @param int $y
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function cropHorizontal(int $width, int $x = 0, int $y = 0, PositionEnum|string $position = PositionEnum::TOP_LEFT): static;



    /*----------------------------------------*
     * Rotate
     *----------------------------------------*/

    /**
     * 画像を回転する
     *
     * @param float $angle
     * @param mixed $bgcolor
     * @return static
     */
    public function rotate(float $angle, mixed $bgcolor = null): static;

    /**
     * 画像を90度回転する
     *
     * @return static
     */
    public function rotate90(): static;

    /**
     * 画像を180度回転する
     *
     * @return static
     */
    public function rotate180(): static;

    /**
     * 画像を270度回転する
     *
     * @return static
     */
    public function rotate270(): static;



    /*----------------------------------------*
     * Resize Canvas
     *----------------------------------------*/

    /**
     * 画像のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvas(?int $width, ?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 画像の垂直方向のキャンバスサイズを変更する
     * 
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasVertical(?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 画像の水平方向のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasHorizontal(?int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを基準として画像のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelative(?int $width, ?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを基準として画像の垂直方向のキャンバスサイズを変更する
     * 
     * @param int|null $height
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelativeVertical(?int $height, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;

    /**
     * 元のサイズを基準として画像の水平方向のキャンバスサイズを変更する
     * 
     * @param int|null $width
     * @param mixed $background
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @return static
     */
    public function resizeCanvasRelativeHorizontal(?int $width, mixed $background = null, PositionEnum|string $position = PositionEnum::CENTER): static;



    /*----------------------------------------*
     * Place
     *----------------------------------------*/

    /**
     * 画像を重ねる
     * 
     * @param \Intervention\Image\Interface\ImageInterface $image
     * @param \LaravelFile\StorageFile\Image\Enum\PositionEnum|string $position
     * @param int $x
     * @param int $y
     * @return static
     */
    public function place(ImageInterface $image, PositionEnum|string $position = PositionEnum::TOP_LEFT, int $x = 0, int $y = 0): static;

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
    public function placeFromStorage(string $dirName, string $baseName, PositionEnum|string $position = PositionEnum::TOP_LEFT, int $x = 0, int $y = 0): static;



    /*----------------------------------------*
     * Effect
     *----------------------------------------*/

    /**
     * 画像の明るさを変更する
     * 
     * @param int $level
     * @return static
     */
    public function brightness(int $level): static;

    /**
     * 画像のコントラストを変更する
     * 
     * @param int $level
     * @return static
     */
    public function contrast(int $level): static;

    /**
     * 画像にガンマ補正をする
     *
     * @param float $gamma
     * @return static
     */
    public function gamma(float $gamma): static;

    /**
     * 画像の色調を変更する
     * 
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return static
     */
    public function colorize(int $red = 0, int $green = 0, int $blue = 0): static;

    /**
     * 画像を水平反転する
     *
     * @return static
     */
    public function flip(): static;

    /**
     * 画像を垂直反転する
     *
     * @return static
     */
    public function flop(): static;

    /**
     * 画像をぼかす
     * 
     * @param int $amount
     * @return static
     */
    public function blur(int $amount = 5): static;

    /**
     * 画像を鮮明にする
     *
     * @param int $amount
     * @return static
     */
    public function sharpen(int $amount = 10): static;

    /**
     * 画像の色を反転させる
     *
     * @return static
     */
    public function colorInvert(): static;

    /**
     * 画像にモザイク処理をする
     * 
     * @param int $size
     * @return static
     */
    public function pixelate(int $size): static;

    /**
     * 画像をモノクロにする
     *
     * @return static
     */
    public function greyScale(): static;
}
