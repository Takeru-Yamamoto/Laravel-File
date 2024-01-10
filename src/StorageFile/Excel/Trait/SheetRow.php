<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetの行に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property Worksheet $sheet
 */
trait SheetRow
{
    /**
     * sheetの行数を取得する
     *
     * @return int
     */
    public function rowCount(): int
    {
        return $this->sheetTargetRowCount(null);
    }

    /**
     * 指定した列の行数を取得する
     * 
     * @param string|null $column
     * @return int
     */
    public function targetRowCount(?string $column): int
    {
        return $this->sheet->getHighestRow($column);
    }

    /**
     * 値が設定されているsheetの行数を取得する
     *
     * @return int
     */
    public function dataRowCount(): int
    {
        return $this->sheetTargetDataRowCount(null);
    }

    /**
     * 指定した列の値が設定されているsheetの行数を取得する
     * 
     * @param string|null $column
     * @return int
     */
    public function targetDataRowCount(?string $column): int
    {
        return $this->sheet->getHighestDataRow($column);
    }

    /**
     * 指定した行の高さを取得する
     *
     * @param int $row
     * @return float
     */
    public function rowHeight(int $row): float
    {
        return $this->sheet->getRowDimension($row)->getRowHeight();
    }

    /**
     * 指定した行の高さを設定する
     *
     * @param int $row
     * @param float $height
     * @return static
     */
    public function setRowHeight(int $row, float $height): static
    {
        $this->sheet->getRowDimension($row)->setRowHeight($height);
        return $this;
    }
}
