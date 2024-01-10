<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Excelファイルの操作に関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property-read Spreadsheet $file
 * @property-read Worksheet $sheet
 * 
 * @method static selectSheet(int $index)
 * @method int selectedSheetIndex()
 */
trait OperateFile
{
    /**
     * シートを作成する
     * 
     * @param string|null $title
     * @param int|null $index
     * @param bool $isSelect
     * @return static
     */
    public function createSheet(?string $title = null, ?int $index = null, bool $isSelect = true): static
    {
        // シートを作成する
        $sheet = new Worksheet($this->file);

        // タイトルがnullでなければ設定する
        if (!is_null($title)) $sheet->setTitle($title);

        // シートを作成する
        $this->addSheet($sheet, $index, $isSelect);

        return $this;
    }

    /**
     * シートを追加する
     * 
     * @param Worksheet $sheet
     * @param int|null $index
     * @param bool $isSelect
     * @return static
     */
    public function addSheet(Worksheet $sheet, ?int $index = null, bool $isSelect = true): static
    {
        // シートを追加する
        $sheet = $this->file->addSheet($sheet, $index);

        // isSelectがtrueなら選択する
        if ($isSelect) $this->selectSheet($this->file->getIndex($sheet));

        return $this;
    }

    /**
     * シートを削除する
     * 
     * @param int|null $index
     * @return static
     */
    public function removeSheet(?int $index = null): static
    {
        // indexがnullなら選択されているシートを削除する
        if (is_null($index)) $index = $this->selectedSheetIndex();

        // シートを削除する
        $this->file->removeSheetByIndex($index);

        return $this;
    }
}
