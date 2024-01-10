<?php

namespace LaravelFile\StorageFile\Video\Interface;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

use FFMpeg\FFProbe\DataMapping\Stream;
use FFMpeg\Filters\FilterInterface;
use FFMpeg\Format\FormatInterface;

/**
 * Storage配下のVideoファイルを扱うクラスのInterface
 * 
 * @package LaravelFile\StorageFile\Video\Interface
 */
interface VideoInterface extends StorageFileInterface
{
    /*----------------------------------------*
     * File Property 
     *----------------------------------------*/

    /**
     * Videoファイルのストリームを取得する
     *
     * @return \FFMpeg\FFProbe\DataMapping\Stream|null
     */
    public function stream(): ?Stream;

    /**
     * Videoファイルの幅を取得する
     *
     * @return int
     */
    public function width(): int;

    /**
     * Videoファイルの高さを取得する
     *
     * @return int
     */
    public function height(): int;

    /**
     * Videoファイルの秒数を取得する
     *
     * @return int
     */
    public function seconds(): int;



    /*----------------------------------------*
     * Operate
     *----------------------------------------*/

    /**
     * 動画にロゴを追加する
     *
     * @param \Closure $watermark
     * @return static
     */
    public function addWatermark(\Closure $watermark): static;

    /**
     * 動画にフィルターを追加する
     *
     * @param \Closure|FilterInterface|array $filter
     * @return static
     */
    public function addFilter(\Closure|FilterInterface|array $filter): static;

    /**
     * 動画をリサイズする
     *
     * @param int $width
     * @param int $height
     * @return static
     */
    public function resize(int $width, int $height): static;



    /*----------------------------------------*
     * Export
     *----------------------------------------*/

    /**
     * 出力処理の実行中に呼び出されるコールバック関数を設定する
     *
     * @param \Closure $progressCallback
     * @return static
     */
    public function onProgress(\Closure $progressCallback): static;

    /**
     * 出力するVideoファイルのフォーマットを設定する
     *
     * @param FormatInterface $format
     * @return static
     */
    public function setFormat(FormatInterface $format): static;

    /**
     * 出力するVideoファイルのフォーマットをMP4に設定する
     * 
     * @return static
     */
    public function setFormatMP4(): static;

    /**
     * 出力するVideoファイルのフォーマットをMOVに設定する
     * 
     * @return static
     */
    public function setFormatMOV(): static;

    /**
     * 出力するVideoファイルのフォーマットをWEBMに設定する
     * 
     * @return static
     */
    public function setFormatWEBM(): static;
}
