<?php

namespace LaravelFile\RequestFile\Trait;

use Illuminate\Http\UploadedFile;

use LaravelFile\StorageFile\Interface\StorageFileInterface;
use LaravelFile\Facade\File;

use Illuminate\Support\Facades\Storage;

/**
 * リクエストから受け取ったファイルのアップロードに関する処理を管理する
 * 
 * @package LaravelFile\RequestFile\Trait
 * 
 * @method string fileName()
 * 
 * @property-read UploadedFile $file
 */
trait Upload
{
    /**
     * ファイルをアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function upload(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface
    {
        // ファイル名が指定されていない場合は元のファイル名を使用する
        if (is_null($registerName)) $registerName = $this->fileName();

        // ファイル名の重複を許可しない場合は重複を避けたファイル名を使用する
        if (!$isAllowOverwriting) $registerName = $this->avoidDuplicationName($dirName, $registerName);

        // ファイルをアップロードする
        $this->file->storeAs($dirName, $registerName);

        try {
            // StorageFileインスタンスを生成する
            $storageFile = File::storage($dirName, $registerName);
        } catch (\Exception $e) {
            // StorageFileインスタンスの生成に失敗した場合はファイルを削除して例外をスローする
            Storage::delete($dirName . DIRECTORY_SEPARATOR . $registerName);
            throw $e;
        }

        return $storageFile;
    }

    /**
     * ファイルを公開ディレクトリにアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function uploadPublic(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface
    {
        // ディレクトリ名が指定されていない場合はpublicディレクトリにアップロードする
        $dirName = empty($dirName) || $dirName === DIRECTORY_SEPARATOR ? "public" : "public" . DIRECTORY_SEPARATOR . $dirName;

        return $this->upload($dirName, $registerName, $isAllowOverwriting);
    }

    /**
     * ファイルを一時ディレクトリにアップロードする
     *
     * @param string $dirName
     * @param string|null $registerName
     * @param bool $isAllowOverwriting
     * @return \LaravelFile\StorageFile\Interface\StorageFileInterface
     */
    public function uploadTmp(string $dirName, string $registerName = null, bool $isAllowOverwriting = false): StorageFileInterface
    {
        // ディレクトリ名が指定されていない場合はtmpディレクトリにアップロードする
        $dirName = empty($dirName) || $dirName === DIRECTORY_SEPARATOR ? "tmp" : $dirName . DIRECTORY_SEPARATOR . "tmp";

        return $this->upload($dirName, $registerName, $isAllowOverwriting);
    }

    /**
     * ファイル名の重複を避けたファイル名を返す
     *
     * @param string $dirName
     * @param string $registerName
     * @param int $number
     * @return string
     */
    private function avoidDuplicationName(string $dirName, string $registerName, int $number = 1): string
    {
        // 同名のファイルが存在しない場合はそのまま返す
        if (!Storage::exists($dirName . DIRECTORY_SEPARATOR . $registerName)) return $registerName;

        $identifier = "(" . $number . ")";

        // ファイル名に識別子が含まれていない場合は識別子を付与して返す
        if (!str_contains($registerName, $identifier)) {
            $exploded = explode(".", $registerName);
            $registerName = $exploded[0] . $identifier . "." . $exploded[1];
            return $this->avoidDuplicationName($dirName, $registerName, $number);
        }

        // ファイル名に識別子が含まれている場合は識別子を更新して返す
        $nextIdentifier = "(" . ($number + 1) . ")";
        $registerName = str_replace($identifier, $nextIdentifier, $registerName);
        return $this->avoidDuplicationName($dirName, $registerName, $number + 1);
    }
}
