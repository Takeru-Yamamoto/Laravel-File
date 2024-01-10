<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv as CSVReader;

/**
 * Storage配下のCSVファイルを扱うクラスのコンストラクタを管理する
 * StorageFile::__construct()で呼び出す
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @method string dirName()
 * @method string baseName()
 * @method string characterCode()
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
        $csv = new CSVReader;

        $this->file = $csv->setInputEncoding($this->characterCode())->load($this->loadPath($this->dirName(), $this->baseName()));

        $this->sheet = $this->file->getSheet(0);
    }
}
