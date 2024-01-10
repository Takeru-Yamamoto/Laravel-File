<?php

namespace LaravelFile\StorageFile\Trait;

use LaravelFile\Enum\FileTypeEnum;

/**
 * Storageに保存されているファイルの種類を管理する
 * 
 * @package LaravelFile\StorageFile\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 */
trait FileType
{
    /**
     * 画像ファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isImage(): bool
    {
        return FileTypeEnum::tryFromStorage($this->dirName(), $this->baseName()) === FileTypeEnum::IMAGE;
    }

    /**
     * 動画ファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isVideo(): bool
    {
        return FileTypeEnum::tryFromStorage($this->dirName(), $this->baseName()) === FileTypeEnum::VIDEO;
    }

    /**
     * Excelファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isExcel(): bool
    {
        return FileTypeEnum::tryFromStorage($this->dirName(), $this->baseName()) === FileTypeEnum::EXCEL;
    }

    /**
     * CSVファイルかどうかを判定する
     * 
     * @return bool
     */
    public function isCsv(): bool
    {
        return FileTypeEnum::tryFromStorage($this->dirName(), $this->baseName()) === FileTypeEnum::CSV;
    }
}
