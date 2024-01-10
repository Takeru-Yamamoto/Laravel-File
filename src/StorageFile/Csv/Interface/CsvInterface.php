<?php

namespace LaravelFile\StorageFile\Csv\Interface;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

/**
 * Storage配下のCSVファイルを扱うクラスのInterface
 * 
 * @package LaravelFile\StorageFile\Csv\Interface
 */
interface CsvInterface extends StorageFileInterface
{
    /*----------------------------------------*
     * Create 
     *----------------------------------------*/

    /**
     * CSVファイルをExcelファイルとして保存する
     *
     * @param string $dirName
     * @param string $baseName
     * @return static
     */
    public function createAsExcel(string $dirName, string $baseName): static;



    /*----------------------------------------*
     * File Property
     *----------------------------------------*/

    /**
     * ファイルのユニークなIDを取得する
     *
     * @return string
     */
    public function uniqueId(): string;

    /**
     * ファイルの文字コードを取得する
     *
     * @throws \RuntimeException
     * @return string
     */
    public function characterCode(): string;



    /*----------------------------------------*
     * Sheet Title 
     *----------------------------------------*/

    /**
     * sheetのタイトルを取得する
     *
     * @return string
     */
    public function title(): string;

    /**
     * sheetのタイトルを設定する
     *
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): static;



    /*----------------------------------------*
     * Sheet Row
     *----------------------------------------*/

    /**
     * sheetの行数を取得する
     *
     * @return int
     */
    public function rowCount(): int;

    /**
     * 指定した列の行数を取得する
     * 
     * @param string|null $column
     * @return int
     */
    public function targetRowCount(?string $column): int;

    /**
     * 値が設定されているsheetの行数を取得する
     *
     * @return int
     */
    public function dataRowCount(): int;

    /**
     * 指定した列の値が設定されているsheetの行数を取得する
     * 
     * @param string|null $column
     * @return int
     */
    public function targetDataRowCount(?string $column): int;

    /**
     * 指定した行の高さを取得する
     *
     * @param int $row
     * @return float
     */
    public function rowHeight(int $row): float;

    /**
     * 指定した行の高さを設定する
     *
     * @param int $row
     * @param float $height
     * @return static
     */
    public function setRowHeight(int $row, float $height): static;



    /*----------------------------------------*
     * Sheet Column
     *----------------------------------------*/

    /**
     * sheetの列数を取得する
     *
     * @return int
     */
    public function columnCount(): int;

    /**
     * 指定された行の列数を取得する
     * 
     * @param int|string|null $row
     * @return int
     */
    public function targetColumnCount(int|string|null $row): int;

    /**
     * 値が設定されているsheetの列数を取得する
     *
     * @return int
     */
    public function dataColumnCount(): int;

    /**
     * 指定された行の値が設定されているsheetの列数を取得する
     * 
     * @param int|string|null $row
     * @return int
     */
    public function targetDataColumnCount(int|string|null $row): int;

    /**
     * 指定した列の幅を取得する
     *
     * @param string $column
     * @return float
     */
    public function columnWidth(string $column): float;

    /**
     * 指定した列の幅を設定する
     *
     * @param string $column
     * @param float $width
     * @return static
     */
    public function setColumnWidth(string $column, float $width): static;



    /*----------------------------------------*
     * Sheet Range
     *----------------------------------------*/

    /**
     * sheetの範囲を取得する
     *
     * @return string
     */
    public function range(): string;

    /**
     * 値が設定されているsheetの範囲を取得する
     *
     * @return string
     */
    public function dataRange(): string;



    /*----------------------------------------*
     * Sheet Cell
     *----------------------------------------*/

    /**
     * 選択されているsheetのセルのデータを取得する
     * 
     * @param string $cell
     * @return mixed
     */
    public function cellData(string $cell): mixed;

    /**
     * 選択されているsheetのセルのデータを設定する
     * 
     * @param string $cell
     * @param mixed $value
     * @return static
     */
    public function setCellData(string $cell, mixed $value): static;

    /**
     * 選択されているsheetのセルのデータを削除する
     * 
     * @param string $cell
     * @return static
     */
    public function removeCellData(string $cell): static;

    /**
     * 選択されているsheetのセルが空かどうかを判定する
     * 
     * @param string $cell
     * @return bool
     */
    public function isEmptyCell(string $cell): bool;

    /**
     * 選択されているsheetのセルを結合する
     * 
     * @param string $range
     * @return static
     */
    public function mergeCells(string $range): static;



    /*----------------------------------------*
     * Sheet Data
     *----------------------------------------*/

    /**
     * 選択されているsheetのデータを全て取得する
     * 
     * @return array<int, mixed>
     */
    public function sheetData(): array;

    /**
     * 範囲を基にsheetのデータを取得する
     *
     * @param string $range
     * @return array<int, mixed>
     */
    public function sheetDataByRange(string $range): array;

    /**
     * 開始セルと終了セルを基にsheetのデータを取得する
     *
     * @param string $startColumn
     * @param int $startRow
     * @param string $endColumn
     * @param int $endRow
     * @return array<int, mixed>
     */
    public function sheetDataBy(string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null): array;

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
    public function sheetDataByRow(\Closure $closure, string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null, array $ignoreRow = []): void;

    /**
     * 選択されているsheetのデータを設定する
     * 
     * @param array $data
     * @param string $startColumn
     * @param int $startRow
     * @return static
     */
    public function setSheetData(array $data, string $startColumn = "A", int $startRow = 1): static;

    /**
     * セルを基にsheetのデータを設定する
     * 
     * @param mixed $value
     * @param string $startCell
     * @return static
     */
    public function setSheetDataByCell(mixed $data, string $startCell): static;

    /**
     * 選択されているsheetのデータを全て削除する
     * 
     * @return static
     */
    public function removeSheetData(): static;

    /**
     * 行を基にsheetのデータを削除する
     * 
     * @param int $startRow
     * @param int $numberOfRows
     * @return static
     */
    public function removeSheetDataByRow(int $startRow = 1, int $numberOfRows = null): static;

    /**
     * 列を基にsheetのデータを削除する
     * 
     * @param string $startColumn
     * @param int $numberOfColumns
     * @return static
     */
    public function removeSheetDataByColumn(string $startColumn = "A", int $numberOfColumns = null): static;

    /**
     * 列のindexを基にsheetのデータを削除する
     * 
     * @param int $startColumnIndex
     * @param int $numberOfColumns
     * @return static
     */
    public function removeSheetDataByColumnIndex(int $startColumnIndex = 1, int $numberOfColumns = null): static;

    /**
     * 選択されているsheetが空かどうかを判定する
     * 
     * @return bool
     */
    public function isEmptySheet(): bool;

    /**
     * 選択されているsheetの指定した範囲が空かどうかを判定する
     * 
     * @param string $range
     * @return bool
     */
    public function isEmptyRange(string $range): bool;

    /**
     * 選択されているsheetの指定した開始セルと終了セルの範囲が空かどうかを判定する
     * 
     * @param string $startColumn
     * @param int $startRow
     * @param string $endColumn
     * @param int $endRow
     * @return bool
     */
    public function isEmptyBy(string $startColumn = "A", int $startRow = 1, string $endColumn = null, int $endRow = null): bool;

    /**
     * 選択されているsheetの指定した行が空かどうかを判定する
     * 
     * @param int $row
     * @return bool
     */
    public function isEmptyRow(int $row): bool;

    /**
     * 選択されているsheetの指定した列が空かどうかを判定する
     * 
     * @param string $column
     * @return bool
     */
    public function isEmptyColumn(string $column): bool;
}
