<?php

namespace App\Providers;

// use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //サービス登録
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //呼び出したいcomposer処理
        View::composer('hello.index', 'App\Http\Composers\HelloComposer');
    }
}
