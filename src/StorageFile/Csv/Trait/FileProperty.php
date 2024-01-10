<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * CSVファイルのプロパティに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @property-read Spreadsheet $file
 * 
 * @method string storagePath()
 */
trait FileProperty
{
    /**
     * ファイルのユニークなIDを取得する
     *
     * @return string
     */
    public function uniqueId(): string
    {
        return $this->file->getID();
    }

    /**
     * ファイルの文字コードを取得する
     *
     * @throws \RuntimeException
     * @return string
     */
    public function characterCode(): string
    {
        $characterCodes = [
            "UTF-8",
            "eucJP-win",
            "SJIS-win",
            "ASCII",
            "EUC-JP",
            "SJIS",
            "JIS",
        ];

        $contents = file_get_contents($this->storagePath());

        foreach ($characterCodes as $characterCode) {
            if ($contents === mb_convert_encoding($contents, $characterCode, $characterCode)) return $characterCode;
        }

        throw new \RuntimeException("Character code not found");
    }
}
