<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetの列に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @property Worksheet $sheet
 */
trait SheetColumn
{
    /**
     * sheetの列数を取得する
     *
     * @return int
     */
    public function columnCount(): int
    {
        return $this->sheetTargetColumnCount(null);
    }

    /**
     * 指定された行の列数を取得する
     * 
     * @param int|string|null $row
     * @return int
     */
    public function targetColumnCount(int|string|null $row): int
    {
        return $this->sheet->getHighestColumn($row);
    }

    /**
     * 値が設定されているsheetの列数を取得する
     *
     * @return int
     */
    public function dataColumnCount(): int
    {
        return $this->sheetTargetDataColumnCount(null);
    }

    /**
     * 指定された行の値が設定されているsheetの列数を取得する
     * 
     * @param int|string|null $row
     * @return int
     */
    public function targetDataColumnCount(int|string|null $row): int
    {
        return $this->sheet->getHighestDataColumn($row);
    }

    /**
     * 指定した列の幅を取得する
     *
     * @param string $column
     * @return float
     */
    public function columnWidth(string $column): float
    {
        return $this->sheet->getColumnDimension($column)->getWidth();
    }

    /**
     * 指定した列の幅を設定する
     *
     * @param string $column
     * @param float $width
     * @return static
     */
    public function setColumnWidth(string $column, float $width): static
    {
        $this->sheet->getColumnDimension($column)->setWidth($width);

        return $this;
    }
}
