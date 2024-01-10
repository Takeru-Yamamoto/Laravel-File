<?php

namespace LaravelFile\StorageFile\Image;

use LaravelFile\StorageFile\StorageFile;
use LaravelFile\StorageFile\Image\Interface\ImageInterface;

use LaravelFile\StorageFile\Image\Trait\ChildConstructor;
use LaravelFile\StorageFile\Image\Trait\Create;
use LaravelFile\StorageFile\Image\Trait\FileProperty;

use LaravelFile\StorageFile\Image\Trait\Resize;
use LaravelFile\StorageFile\Image\Trait\Scale;
use LaravelFile\StorageFile\Image\Trait\Cover;
use LaravelFile\StorageFile\Image\Trait\Contain;
use LaravelFile\StorageFile\Image\Trait\Crop;
use LaravelFile\StorageFile\Image\Trait\Rotate;
use LaravelFile\StorageFile\Image\Trait\ResizeCanvas;

use LaravelFile\StorageFile\Image\Trait\Place;

use LaravelFile\StorageFile\Image\Trait\Effect;

/**
 * Storage配下の画像ファイルを扱うクラス
 * 
 * @package LaravelFile\StorageFile\Image
 */
class Image extends StorageFile implements ImageInterface
{
    use ChildConstructor;
    use Create;
    use FileProperty;

    use Resize;
    use Scale;
    use Cover;
    use Contain;
    use Crop;
    use Rotate;
    use ResizeCanvas;

    use Place;

    use Effect;
}
