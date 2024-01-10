<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Excelファイルのプロパティに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property-read Spreadsheet $file
 * @property-read Worksheet $sheet
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
     * シート数を取得する
     *
     * @return int
     */
    public function sheetCount(): int
    {
        return $this->file->getSheetCount();
    }

    /**
     * 選択されているシートのindexを取得する
     *
     * @return int
     */
    public function selectedSheetIndex(): int
    {
        return $this->file->getIndex($this->sheet);
    }

    /**
     * アクティブなシートのindexを取得する
     *
     * @return int
     */
    public function activeSheetIndex(): int
    {
        return $this->file->getActiveSheetIndex();
    }

    /**
     * シートのタイトル一覧を取得する
     *
     * @return array<int, string>
     */
    public function sheetNames(): array
    {
        return $this->file->getSheetNames();
    }
}
