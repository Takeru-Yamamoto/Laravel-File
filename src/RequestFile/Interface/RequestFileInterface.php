<?php

namespace LaravelFile\RequestFile\Interface;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

/**
 * RequestFileのInterface
 * 
 * @package LaravelFile\RequestFile\Interface
 */
interface RequestFileInterface
{
    /*----------------------------------------*
     * File Info
     *----------------------------------------*/

    /**
     * アップロードされたファイルのファイル名
     *
     * @var string
     */
    public function fileName(): string;

    /**
     * アップロードされたファイルのMIMEタイプ
     *
     * @var string
     */
    public function mimeType(): string;

    /**
     * アップロードされたファイルのサイズ
     *
     * @var int
     */
    public function size(): int;

    /**
     * アップロードされたファイルの拡張子
     *
     * @var string
     */
    public function extension(): string;



    /*----------------------------------------*
     * Upload
     *----------------------------------------*/

    /**
     * ファイルをアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function upload(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface;

    /**
     * ファイルを公開ディレクトリにアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function uploadPublic(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface;

    /**
     * ファイルを一時ディレクトリにアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function uploadTmp(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface;
}
