<?php

namespace LaravelFile\RequestFile\Trait;

use Illuminate\Http\UploadedFile;

/**
 * リクエストから受け取ったファイルの情報を管理する
 * 
 * @package LaravelFile\RequestFile\Trait
 * 
 * @property-read UploadedFile $file
 */
trait FileInfo
{
    /**
     * アップロードされたファイルのファイル名
     *
     * @var string
     */
    public function fileName(): string
    {
        return $this->file->getClientOriginalName();
    }

    /**
     * アップロードされたファイルのMIMEタイプ
     *
     * @var string
     */
    public function mimeType(): string
    {
        return $this->file->getClientMimeType();
    }

    /**
     * アップロードされたファイルのサイズ
     *
     * @var int
     */
    public function size(): int
    {
        return $this->file->getSize();
    }

    /**
     * アップロードされたファイルの拡張子
     *
     * @var string
     */
    public function extension(): string
    {
        return $this->file->extension();
    }
}
