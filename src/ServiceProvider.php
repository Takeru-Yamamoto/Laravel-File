<?php

namespace LaravelFile;

use Illuminate\Support\ServiceProvider as Provider;

use LaravelFile\FileManager;
use LaravelFile\Facade\File;

/**
 * ServiceProvider
 * Facadeの登録を行う
 * 
 * @package LaravelFile
 */
class ServiceProvider extends Provider
{
    /**
     * アプリケーションの起動時に実行する
     * FacadeとManagerの紐づけを行う
     * 
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(File::class, function () {
            return new FileManager();
        });
    }
}
