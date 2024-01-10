<?php

namespace LaravelFile\StorageFile\Video;

use LaravelFile\StorageFile\StorageFile;
use LaravelFile\StorageFile\Video\Interface\VideoInterface;

use LaravelFile\StorageFile\Video\Trait\ChildConstructor;
use LaravelFile\StorageFile\Video\Trait\Create;
use LaravelFile\StorageFile\Video\Trait\FileProperty;

use LaravelFile\StorageFile\Video\Trait\Operate;
use LaravelFile\StorageFile\Video\Trait\Export;

/**
 * Storage配下の動画ファイルを扱うクラス
 * 
 * @package LaravelFile\StorageFile\Video
 */
class Video extends StorageFile implements VideoInterface
{
    use ChildConstructor;
    use Create;
    use FileProperty;

    use Operate;
    use Export;
}
