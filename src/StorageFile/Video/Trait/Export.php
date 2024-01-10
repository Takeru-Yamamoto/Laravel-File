<?php

namespace LaravelFile\StorageFile\Video\Trait;

use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\FFMpeg\CopyFormat;

use FFMpeg\Format\FormatInterface;
use FFMpeg\Format\Video\X264;
use FFMpeg\Format\Video\WebM;

/**
 * Videoファイルの出力処理を管理する
 * 
 * @package LaravelFile\StorageFile\Video\Trait
 * 
 * @property-read MediaOpener $file
 */
trait Export
{
    /**
     * 出力処理の実行中に呼び出されるコールバック関数
     *
     * @var \Closure|null
     */
    private ?\Closure $progressCallback = null;

    /**
     * 出力するVideoファイルのフォーマット
     *
     * @var FormatInterface|null
     */
    private ?FormatInterface $format = null;


    /**
     * Videoファイルのエクスポーターを返却する
     *
     * @return static
     */
    protected function getExporter(): MediaExporter
    {
        $exporter = $this->file->export();

        if (!is_null($this->progressCallback)) $exporter = $exporter->onProgress($this->progressCallback);

        $format = $this->format ?? new CopyFormat();

        $exporter = $exporter->inFormat($format);

        return $exporter;
    }

    /**
     * 出力処理の実行中に呼び出されるコールバック関数を設定する
     *
     * @param \Closure $progressCallback
     * @return static
     */
    public function onProgress(\Closure $progressCallback): static
    {
        $this->progressCallback = $progressCallback;

        return $this;
    }

    /**
     * 出力するVideoファイルのフォーマットを設定する
     *
     * @param FormatInterface $format
     * @return static
     */
    public function setFormat(FormatInterface $format): static
    {
        $this->format = $format;

        return $this;
    }

    /**
     * 出力するVideoファイルのフォーマットをMP4に設定する
     * 
     * @return static
     */
    public function setFormatMP4(): static
    {
        return $this->setFormat(new X264("libmp3lame", "libx264"));
    }

    /**
     * 出力するVideoファイルのフォーマットをMOVに設定する
     * 
     * @return static
     */
    public function setFormatMOV(): static
    {
        return $this->setFormat(new X264("libmp3lame", "libx264"));
    }

    /**
     * 出力するVideoファイルのフォーマットをWEBMに設定する
     * 
     * @return static
     */
    public function setFormatWEBM(): static
    {
        return $this->setFormat(new WebM());
    }
}
