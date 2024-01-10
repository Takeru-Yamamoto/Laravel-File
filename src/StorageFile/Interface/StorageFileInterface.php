<?php

namespace LaravelFile\StorageFile\Interface;

/**
 * StorageFileのInterface
 * 
 * @package LaravelFile\StorageFile\Interface
 */
interface StorageFileInterface
{
    /*----------------------------------------*
     * FileInfo 
     *----------------------------------------*/

    /**
     * ファイルが存在するディレクトリパスを取得する
     * 
     * @return string
     */
    public function dirName(): string;

    /**
     * ファイル名を取得する
     * 
     * @return string
     */
    public function baseName(): string;

    /**
     * 拡張子を取得する
     * 
     * @return string
     */
    public function extension(): string;

    /**
     * 拡張子を含まないファイル名を取得する
     * 
     * @return string
     */
    public function fileName(): string;

    /**
     * ファイルのサイズを取得する
     * 
     * @return int
     */
    public function size(): int;

    /**
     * ファイルのMIMEタイプを取得する
     * 
     * @return string
     */
    public function mimeType(): string;



    /*----------------------------------------*
     * FilePath 
     *----------------------------------------*/

    /**
     * storage/appディレクトリからの相対パス
     * 
     * @return string
     */
    public function filePath(): string;

    /**
     * ファイルの絶対パス
     * 
     * @return string
     */
    public function storagePath(): string;

    /**
     * publicディレクトリにあるファイルの絶対パス
     * 
     * @return string
     */
    public function publicPath(): string;

    /**
     * publicディレクトリにアクセスする為のURL
     * 
     * @return string
     */
    public function assetUrl(): string;



    /*----------------------------------------*
     * FileType 
     *----------------------------------------*/

    /**
     * 画像ファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isImage(): bool;

    /**
     * 動画ファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isVideo(): bool;

    /**
     * Excelファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isExcel(): bool;

    /**
     * CSVファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isCsv(): bool;



    /*----------------------------------------*
     * Operate 
     *----------------------------------------*/

    /**
     * ファイルを保存する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function create(string $dirName, string $baseName): StorageFileInterface;

    /**
     * ファイルを上書き保存する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function save(): StorageFileInterface;

    /**
     * ファイルを別名で保存する
     *
     * @param string $registerName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function saveAs(string $registerName): StorageFileInterface;

    /**
     * ファイルを削除する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function delete(): StorageFileInterface;

    /**
     * ファイルを移動する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function move(string $dirName, string $baseName): StorageFileInterface;

    /**
     * ファイルを別名で移動する
     *
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveAs(string $baseName): StorageFileInterface;

    /**
     * ファイルを別ディレクトリに移動する
     *
     * @param string $dirName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveDirectory(string $dirName): StorageFileInterface;

    /**
     * ファイルをディレクトリ内のtmpディレクトリに移動する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveToTmp(): StorageFileInterface;

    /**
     * ファイルをディレクトリ内のtmpディレクトリから移動する
     *
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function moveFromTmp(): StorageFileInterface;
}
