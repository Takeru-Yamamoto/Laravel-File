<?php

namespace LaravelFile\StorageFile\Video\Trait;

use ProtoneMedia\LaravelFFMpeg\MediaOpener;

use FFMpeg\Filters\FilterInterface;

/**
 * Videoファイルの操作を管理する
 * 
 * @package LaravelFile\StorageFile\Video\Trait
 * 
 * @property-read MediaOpener $file
 */
trait Operate
{
    /**
     * 動画にロゴを追加する
     *
     * @param \Closure $watermark
     * @return static
     */
    public function addWatermark(\Closure $watermark): static
    {
        $this->file = $this->file->addWatermark($watermark);

        return $this;
    }

    /**
     * 動画にフィルターを追加する
     *
     * @param \Closure|FilterInterface|array $filter
     * @return static
     */
    public function addFilter(\Closure|FilterInterface|array $filter): static
    {
        $this->file = $this->file->addFilter($filter);

        return $this;
    }

    /**
     * 動画をリサイズする
     *
     * @param int $width
     * @param int $height
     * @return static
     */
    public function resize(int $width, int $height): static
    {
        $this->file = $this->file->resize($width, $height);

        return $this;
    }
}
