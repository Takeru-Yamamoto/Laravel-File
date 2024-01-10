<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * 選択されているsheetのタイトルに関する処理を管理する
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @property Worksheet $sheet
 */
trait SheetTitle
{
    /**
     * sheetのタイトルを取得する
     *
     * @return string
     */
    public function title(): string
    {
        return $this->sheet->getTitle();
    }

    /**
     * sheetのタイトルを設定する
     *
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): static
    {
        $this->sheet->setTitle($title);
        return $this;
    }
}
