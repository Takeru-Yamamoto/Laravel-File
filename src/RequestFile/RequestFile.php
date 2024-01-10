<?php

namespace LaravelFile\RequestFile;

use LaravelFile\RequestFile\Interface\RequestFileInterface;

use LaravelFile\RequestFile\Trait\Constructor;
use LaravelFile\RequestFile\Trait\FileInfo;
use LaravelFile\RequestFile\Trait\Upload;

/**
 * リクエストから受け取ったファイルを扱うクラス
 * 
 * @package LaravelFile
 */
class RequestFile implements RequestFileInterface
{
    use Constructor;
    use FileInfo;
    use Upload;
}
