<?php

namespace LaravelFile\StorageFile\Excel;

use LaravelFile\StorageFile\StorageFile;
use LaravelFile\StorageFile\Excel\Interface\ExcelInterface;

use LaravelFile\StorageFile\Excel\Trait\ChildConstructor;
use LaravelFile\StorageFile\Excel\Trait\Create;
use LaravelFile\StorageFile\Excel\Trait\FileProperty;

use LaravelFile\StorageFile\Excel\Trait\OperateFile;
use LaravelFile\StorageFile\Excel\Trait\SelectSheet;

use LaravelFile\StorageFile\Excel\Trait\SheetTitle;
use LaravelFile\StorageFile\Excel\Trait\SheetRow;
use LaravelFile\StorageFile\Excel\Trait\SheetColumn;
use LaravelFile\StorageFile\Excel\Trait\SheetRange;
use LaravelFile\StorageFile\Excel\Trait\SheetCell;
use LaravelFile\StorageFile\Excel\Trait\SheetData;

/**
 * Storage配下のExcelファイルを扱うクラス
 * 
 * @package LaravelFile\StorageFile\Excel
 */
class Excel extends StorageFile implements ExcelInterface
{
    use ChildConstructor;
    use Create;
    use FileProperty;

    use OperateFile;
    use SelectSheet;

    use SheetTitle;
    use SheetRow;
    use SheetColumn;
    use SheetRange;
    use SheetCell;
    use SheetData;
}
