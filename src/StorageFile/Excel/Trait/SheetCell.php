<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetのセルに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property Worksheet $sheet
 */
trait SheetCell
{
    /**
     * 選択されているsheetのセルのデータを取得する
     * 
     * @param string $cell
     * @return mixed
     */
    public function cellData(string $cell): mixed
    {
        return $this->sheet->getCell($cell)->getValue();
    }

    /**
     * 選択されているsheetのセルのデータを設定する
     * 
     * @param string $cell
     * @param mixed $value
     * @return static
     */
    public function setCellData(string $cell, mixed $value): static
    {
        $this->sheet->setCellValue($cell, $value);

        return $this;
    }

    /**
     * 選択されているsheetのセルのデータを削除する
     * 
     * @param string $cell
     * @return static
     */
    public function removeCellData(string $cell): static
    {
        $this->sheet->setCellValue($cell, null);

        return $this;
    }

    /**
     * 選択されているsheetのセルが空かどうかを判定する
     * 
     * @param string $cell
     * @return bool
     */
    public function isEmptyCell(string $cell): bool
    {
        return empty($this->cellData($cell));
    }

    /**
     * 選択されているsheetのセルを結合する
     * 
     * @param string $range
     * @return static
     */
    public function mergeCells(string $range): static
    {
        $this->sheet->mergeCells($range);

        return $this;
    }
}
