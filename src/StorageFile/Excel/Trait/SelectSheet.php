<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Excelファイルに含まれるsheetを選択する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @property-read Spreadsheet $file
 * @property Worksheet $sheet
 * 
 * @method int sheetCount()
 * @method int selectedSheetIndex()
 */
trait SelectSheet
{
    /**
     * indexを指定してsheetを選択する
     * 
     * @param int $index
     * @return static
     */
    public function selectSheet(int $index): static
    {
        $this->sheet = $this->file->getSheet($index);

        return $this;
    }

    /**
     * シートのタイトルを指定してsheetを選択する
     * 
     * @param string $title
     * @return static
     */
    public function selectSheetByTitle(string $title): static
    {
        $this->sheet = $this->file->getSheetByName($title);

        return $this;
    }

    /**
     * アクティブなシートを選択する
     * 
     * @return static
     */
    public function selectActiveSheet(): static
    {
        $this->sheet = $this->file->getActiveSheet();

        return $this;
    }

    /**
     * 最初のシートを選択する
     * 
     * @return static
     */
    public function selectFirstSheet(): static
    {
        return $this->selectSheet(0);
    }

    /**
     * 最後のシートを選択する
     * 
     * @return static
     */
    public function selectLastSheet(): static
    {
        return $this->selectSheet($this->sheetCount() - 1);
    }

    /**
     * 選択されているシートのひとつ前のシートを選択する
     * 
     * @throws \RuntimeException
     * @return static
     */
    public function selectPrevSheet(): static
    {
        if ($this->selectedSheetIndex() <= 0) throw new \RuntimeException("Can't select prev sheet. Because selected sheet is first sheet.");

        return $this->selectSheet($this->selectedSheetIndex() - 1);
    }

    /**
     * 選択されているシートのひとつ後のシートを選択する
     * 
     * @throws \RuntimeException
     * @return static
     */
    public function selectNextSheet(): static
    {
        if ($this->selectedSheetIndex() >= ($this->sheetCount() - 1)) throw new \RuntimeException("Can't select next sheet. Because selected sheet is last sheet.");

        return $this->selectSheet($this->selectedSheetIndex() + 1);
    }
}
