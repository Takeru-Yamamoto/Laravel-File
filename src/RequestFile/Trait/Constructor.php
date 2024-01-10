<?php

namespace LaravelFile\RequestFile\Trait;

use Illuminate\Http\UploadedFile;

/**
 * RequestFileクラスのコンストラクタを管理する
 * 
 * @package LaravelFile\RequestFile\Trait
 */
trait Constructor
{
    /**
     * アップロードされたファイル
     * 
     * @var UploadedFile
     */
    public readonly UploadedFile $file;


    /**
     * コンストラクタ
     *
     * @param UploadedFile $file
     */
    function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }
}
