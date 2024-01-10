<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetのデータに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @property Worksheet $sheet
 * 
 * @method string dataRange()
 * @method int dataColumnCount()
 * @method int dataRowCount()
 */
trait SheetData
{
    /*----------------------------------------*
     * Get Data
     *----------------------------------------*/

    /**
     * 選択されているsheetのデータを全て取得する
     * 
     * @return array<int, mixed>
     */
    public function sheetData(): array
    {
        return $this->sheetDataByRange($this->dataRange());
    }

    /**
     * 範囲を基にsheetのデータを取得する
     *
     * @param string $range
     * @return array<int, mixed>
     */
    public function sheetDataByRange(string $range): array
    {
        return $this->sheet->rangeToArray($range);
    }

    /**
     * 開始セルと終了セルを基にsheetのデータを取得する
     *
     * @param string $startColumn
     * @param int $startRow
     * @param string $endColumn
     * @param int $endRow
     * @return array<int, mixed>
     */
    public function sheetDataBy(string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null): array
    {
        if (is_null($endColumn)) $endColumn = $this->dataColumnCount();
        if (is_null($endRow)) $endRow = $this->dataRowCount();

        $range = $startColumn . $startRow . ":" . $endColumn . $endRow;

        return $this->sheetDataByRange($range);
    }

    /**
     * 選択されているsheetのデータを１行ずつ取得し、クロージャを実行する
     *
     * @param \Closure $closure
     * @param string $startColumn
     * @param int $startRow
     * @param string $endColumn
     * @param int $endRow
     * @param array $ignoreRow
     * 
     * @return void
     */
    public function sheetDataByRow(\Closure $closure, string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null, array $ignoreRow = []): void
    {
        if (is_null($endColumn)) $endColumn = $this->dataColumnCount();
        if (is_null($endRow)) $endRow = $this->dataRowCount();

        for ($rowIndex = $startRow; $rowIndex <= $endRow; $rowIndex++) {
            if (in_array($rowIndex, $ignoreRow)) continue;

            $row = $this->sheetDataBy($startColumn, $rowIndex, $endColumn, $rowIndex);

            $closure($row[0]);
        }
    }



    /*----------------------------------------*
     * Set Data
     *----------------------------------------*/

    /**
     * 選択されているsheetのデータを設定する
     * 
     * @param array $data
     * @param string $startColumn
     * @param int $startRow
     * @return static
     */
    public function setSheetData(array $data, string $startColumn = "A", int $startRow = 1): static
    {
        return $this->setSheetDataByCell($data, $startColumn . $startRow);
    }

    /**
     * セルを基にsheetのデータを設定する
     * 
     * @param mixed $value
     * @param string $startCell
     * @return static
     */
    public function setSheetDataByCell(mixed $data, string $startCell): static
    {
        $this->sheet->fromArray($data, null, $startCell, false);

        return $this;
    }



    /*----------------------------------------*
     * Remove Data
     *----------------------------------------*/

    /**
     * 選択されているsheetのデータを全て削除する
     * 
     * @return static
     */
    public function removeSheetData(): static
    {
        $this->removeSheetDataByRow();

        return $this;
    }

    /**
     * 行を基にsheetのデータを削除する
     * 
     * @param int $startRow
     * @param int $numberOfRows
     * @return static
     */
    public function removeSheetDataByRow(int $startRow = 1, int $numberOfRows = null): static
    {
        if (is_null($numberOfRows)) $numberOfRows = $this->dataRowCount();

        $this->sheet->removeRow($startRow, $numberOfRows);

        return $this;
    }

    /**
     * 列を基にsheetのデータを削除する
     * 
     * @param string $startColumn
     * @param int $numberOfColumns
     * @return static
     */
    public function removeSheetDataByColumn(string $startColumn = "A", int $numberOfColumns = null): static
    {
        if (is_null($numberOfColumns)) $numberOfColumns = $this->dataColumnCount();

        $this->sheet->removeColumn($startColumn, $numberOfColumns);

        return $this;
    }

    /**
     * 列のindexを基にsheetのデータを削除する
     * 
     * @param int $startColumnIndex
     * @param int $numberOfColumns
     * @return static
     */
    public function removeSheetDataByColumnIndex(int $startColumnIndex = 1, int $numberOfColumns = null): static
    {
        if (is_null($numberOfColumns)) $numberOfColumns = $this->dataColumnCount();

        $this->sheet->removeColumnByIndex($startColumnIndex, $numberOfColumns);

        return $this;
    }



    /*----------------------------------------*
     * Is Empty
     *----------------------------------------*/

    /**
     * 選択されているsheetが空かどうかを判定する
     * 
     * @return bool
     */
    public function isEmptySheet(): bool
    {
        return empty($this->sheetData());
    }

    /**
     * 選択されているsheetの指定した範囲が空かどうかを判定する
     * 
     * @param string $range
     * @return bool
     */
    public function isEmptyRange(string $range): bool
    {
        return empty($this->sheetDataByRange($range));
    }

    /**
     * 選択されているsheetの指定した開始セルと終了セルの範囲が空かどうかを判定する
     * 
     * @param string $startColumn
     * @param int $startRow
     * @param string $endColumn
     * @param int $endRow
     * @return bool
     */
    public function isEmptyBy(string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null): bool
    {
        return empty($this->sheetDataBy($startColumn, $startRow, $endColumn, $endRow));
    }

    /**
     * 選択されているsheetの指定した行が空かどうかを判定する
     * 
     * @param int $row
     * @return bool
     */
    public function isEmptyRow(int $row): bool
    {
        return $this->isEmptyBy("A", $row, null, $row);
    }

    /**
     * 選択されているsheetの指定した列が空かどうかを判定する
     * 
     * @param string $column
     * @return bool
     */
    public function isEmptyColumn(string $column): bool
    {
        return $this->isEmptyBy($column, 1, $column, null);
    }
}
