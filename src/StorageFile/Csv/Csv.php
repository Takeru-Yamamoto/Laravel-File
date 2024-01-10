<?php

namespace LaravelFile\StorageFile\Csv;

use LaravelFile\StorageFile\StorageFile;
use LaravelFile\StorageFile\Csv\Interface\CsvInterface;

use LaravelFile\StorageFile\Csv\Trait\ChildConstructor;
use LaravelFile\StorageFile\Csv\Trait\Create;
use LaravelFile\StorageFile\Csv\Trait\FileProperty;

use LaravelFile\StorageFile\Csv\Trait\SheetTitle;
use LaravelFile\StorageFile\Csv\Trait\SheetRow;
use LaravelFile\StorageFile\Csv\Trait\SheetColumn;
use LaravelFile\StorageFile\Csv\Trait\SheetRange;
use LaravelFile\StorageFile\Csv\Trait\SheetCell;
use LaravelFile\StorageFile\Csv\Trait\SheetData;

/**
 * Storage配下のCSVファイルを扱うクラス
 * 
 * @package LaravelFile\StorageFile\Csv
 */
class Csv extends StorageFile implements CsvInterface
{
    use ChildConstructor;
    use Create;
    use FileProperty;

    use SheetTitle;
    use SheetRow;
    use SheetColumn;
    use SheetRange;
    use SheetCell;
    use SheetData;
}
