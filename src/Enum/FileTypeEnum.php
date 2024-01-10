<?php

namespace LaravelFile\Enum;

use Illuminate\Support\Facades\Storage;

/**
 * FileのMIMEタイプを基にしたファイルの種類を表すEnum
 * 
 * @package LaravelFile\Enum
 */
enum FileTypeEnum: string
{
    case IMAGE = "image";
    case VIDEO = "video";
    case EXCEL = "excel";
    case CSV   = "csv";

    public static function tryFromStorage(string $dirName, string $baseName): ?static
    {
        $imageMimeTypes = [
            "image/avif",
            "image/gif",
            "image/jpeg",
            "image/png",
            "image/webp",

            "image/bmp",
        ];

        $videoMimeTypes = [
            "video/mp4",
            "video/webm",
            "video/ogg",
        ];

        $excelMimeTypes = [
            "application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        ];

        $csvMimeTypes = [
            "text/plain",
            "text/csv",
        ];

        $mimeType = Storage::mimeType($dirName . DIRECTORY_SEPARATOR . $baseName);

        return match (true) {
            in_array($mimeType, $imageMimeTypes) => static::IMAGE,
            in_array($mimeType, $videoMimeTypes) => static::VIDEO,
            in_array($mimeType, $excelMimeTypes) => static::EXCEL,
            in_array($mimeType, $csvMimeTypes)   => static::CSV,

            default => null,
        };
    }
}
