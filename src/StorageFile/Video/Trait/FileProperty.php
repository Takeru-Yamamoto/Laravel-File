<?php

namespace LaravelFile\StorageFile\Video\Trait;

use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use FFMpeg\FFProbe\DataMapping\Stream;

/**
 * Videoファイルのプロパティに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Video\Trait
 * 
 * @property-read MediaOpener $file
 */
trait FileProperty
{
    /**
     * Videoファイルのストリームを取得する
     *
     * @return \FFMpeg\FFProbe\DataMapping\Stream|null
     */
    public function stream(): ?Stream
    {
        return $this->file->getVideoStream();
    }

    /**
     * Videoファイルの幅を取得する
     *
     * @return int
     */
    public function width(): int
    {
        return $this->stream()->get("width") ?? 0;
    }

    /**
     * Videoファイルの高さを取得する
     *
     * @return int
     */
    public function height(): int
    {
        return $this->stream()->get("height") ?? 0;
    }

    /**
     * Videoファイルの秒数を取得する
     *
     * @return int
     */
    public function seconds(): int
    {
        return $this->file->getDurationInSeconds();
    }
}
