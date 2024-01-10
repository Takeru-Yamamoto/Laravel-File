<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetの範囲に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property Worksheet $sheet
 */
trait SheetRange
{
    /**
     * sheetの範囲を取得する
     *
     * @return string
     */
    public function range(): string
    {
        return $this->sheet->calculateWorksheetDimension();
    }

    /**
     * 値が設定されているsheetの範囲を取得する
     *
     * @return string
     */
    public function dataRange(): string
    {
        return $this->sheet->calculateWorksheetDataDimension();
    }
}
