<?php

namespace LaravelFile\StorageFile;

use LaravelFile\StorageFile\Interface\StorageFileInterface;

use LaravelFile\StorageFile\Trait\Constructor;
use LaravelFile\StorageFile\Trait\FileInfo;
use LaravelFile\StorageFile\Trait\FilePath;
use LaravelFile\StorageFile\Trait\FileType;
use LaravelFile\StorageFile\Trait\Operate;

abstract class StorageFile implements StorageFileInterface
{
    use Constructor;
    use FileInfo;
    use FilePath;
    use FileType;
    use Operate;
}
