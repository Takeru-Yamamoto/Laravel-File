<?php

namespace LaravelFile\StorageFile\Excel\Trait;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Storage配下のExcelファイルを扱うクラスのコンストラクタを管理する
 * StorageFile::__construct()で呼び出す
 * 
 * @package LaravelFile\StorageFile\Excel\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 */
trait ChildConstructor
{
    /**
     * Excelファイルのインスタンス
     *
     * @var Spreadsheet
     */
    private Spreadsheet $file;

    /**
     * Excelファイルの選択されているシートのインスタンス
     *
     * @var Worksheet
     */
    private Worksheet $sheet;


    /**
     * ファイルを読み込むパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function loadPath(string $dirName, string $baseName): string
    {
        return storage_path("app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName);
    }

    /**
     * 継承先クラスのコンストラクタ
     * StorageFileのコンストラクタで呼び出す
     *
     * @return void
     */
    protected function childConstruct(): void
    {
        $this->file = IOFactory::load($this->loadPath($this->dirName(), $this->baseName()));

        $this->sheet = $this->file->getActiveSheet();
    }
}
