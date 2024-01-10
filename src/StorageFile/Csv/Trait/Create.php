<?php

namespace LaravelFile\StorageFile\Csv\Trait;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Storage配下のCSVファイルを扱うクラスの保存処理を管理する
 * 
 * @package LaravelFile\StorageFile\Csv\Trait
 * 
 * @property-read Spreadsheet $file
 * 
 * @method \LaravelFile\StorageFile\Interface\StorageFileInterface getNewInstance(string $dirName, string $baseName)
 */
trait Create
{
    /**
     * ファイルを保存するパスの成型を行う
     *
     * @param string $dirName
     * @param string $baseName
     * @return string
     */
    protected function createPath(string $dirName, string $baseName): string
    {
        return "app" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $baseName;
    }

    /**
     * CSVファイルを保存する
     * StorageFileでabstract宣言されているメソッド
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function create(string $dirName, string $baseName): StorageFileInterface
    {
        $writer = new Csv($this->file);

        $writer->save($this->createPath($dirName, $baseName));

        return $this->getNewInstance($dirName, $baseName);
    }

    /**
     * CSVファイルをExcelファイルとして保存する
     *
     * @param string $dirName
     * @param string $baseName
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function createAsExcel(string $dirName, string $baseName): StorageFileInterface
    {
        $writer = new Xlsx($this->file);

        $writer->save($this->createPath($dirName, $baseName));

        return $this->getNewInstance($dirName, $baseName);
    }
}
