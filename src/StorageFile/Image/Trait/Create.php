<?php

namespace LaravelFile\StorageFile\Image\Trait;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

use Intervention\Image\Image;
use Intervention\Image\EncodedImage;

/**
 * Storage配下のImageファイルを扱うクラスの保存処理を管理する
 * 
 * @package LaravelFile\StorageFile\Image\Trait
 * 
 * @property-read Image $file
 * 
 * @method \LaravelFile\StorageFile\Interface\StorageFileInterface getNewInstance(string $dirName, string $baseName)
 * @method string dirName()
 * @method string baseName()
 * @method string fileName()
 * @method string mimeType()
 * @method static moveAs(string $baseName)
 */
trait Create
{
    /**
     * ファイルを保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function createPath(string $dirName, string $baseName): string
    {
        return "app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName;
    }

    /**
     * Imageファイルを保存する
     * StorageFileでabstract宣言されているメソッド
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function create(string $dirName, string $baseName): StorageFileInterface
    {
        // ファイルのMIMEタイプによって保存形式を変更する
        $encodedImage = match ($this->mimeType()) {
            "image/jpeg" => $this->file->toJpeg(100),
            "image/png"  => $this->file->toPng(),
            "image/gif"  => $this->file->toGif(),
            "image/webp" => $this->file->toWebp(100),
            "image/bmp"  => $this->file->toBmp(),
            "image/avif" => $this->file->toAvif(100),

            default => null,
        };

        $encodedImage->save($this->createPath($dirName, $baseName));

        return $this->getNewInstance($dirName, $baseName);
    }


    /**
     * Imageファイルのファイル形式を変換し、保存する
     *
     * @param EncodedImage $encodedImage
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    protected function encode(EncodedImage $encodedImage, string $extension): StorageFileInterface
    {
        $encodedImage->save($this->createPath($this->dirName(), $this->baseName()));

        return $this->moveAs($this->fileName() . "." . $extension);
    }

    /**
     * ImageファイルをJPG形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeJpeg(int $quality = 100, string $extension = "jpg"): StorageFileInterface
    {
        $encodedImage = $this->file->toJpeg($quality);

        return $this->encode($encodedImage, $extension);
    }

    /**
     * ImageファイルをPNG形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodePng(string $extension = "png"): StorageFileInterface
    {
        $encodedImage = $this->file->toPng();

        return $this->encode($encodedImage, $extension);
    }

    /**
     * ImageファイルをGIF形式に変換し、保存する
     *
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeGif(string $extension = "gif"): StorageFileInterface
    {
        $encodedImage = $this->file->toGif();

        return $this->encode($encodedImage, $extension);
    }

    /**
     * ImageファイルをWEBP形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeWebp(int $quality = 100, string $extension = "webp"): StorageFileInterface
    {
        $encodedImage = $this->file->toWebp($quality);

        return $this->encode($encodedImage, $extension);
    }

    /**
     * ImageファイルをBMP形式に変換し、保存する
     *
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeBmp(string $extension = "bmp"): StorageFileInterface
    {
        $encodedImage = $this->file->toBmp();

        return $this->encode($encodedImage, $extension);
    }

    /**
     * ImageファイルをAVIF形式に変換し、保存する
     *
     * @param int $quality
     * @param string $extension
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function encodeAvif(int $quality = 100, string $extension = "avif"): StorageFileInterface
    {
        $encodedImage = $this->file->toAvif($quality);

        return $this->encode($encodedImage, $extension);
    }
}
