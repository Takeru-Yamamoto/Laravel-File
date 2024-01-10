<?php

namespace LaravelFile\StorageFile\Trait;

/**
 * StorageFileクラスのコンストラクタを管理する
 * 
 * @package LaravelFile\StorageFile\Trait
 */
trait Constructor
{
    /**
     * ファイルが存在するディレクトリパス
     *
     * @var string
     */
    private string $dirName;

    /**
     * ファイル名
     *
     * @var string
     */
    private string $baseName;


    /**
     * コンストラクタ
     * childConstruct()を呼び出す
     *
     * @param string $dirName
     * @param string $baseName
     */
    function __construct(string $dirName, string $baseName)
    {
        $this->dirName  = $dirName;
        $this->baseName = $baseName;

        $this->childConstruct();
    }

    /**
     * 継承先クラスのコンストラクタ
     * StorageFileのコンストラクタで呼び出す
     *
     * @return void
     */
    abstract protected function childConstruct(): void;
}
