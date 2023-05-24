<?php

namespace Kakao\Pay\Face;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class KakaoPayFaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() : void
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() : void
    {
        //route add
        Route::middleware('api')
        ->prefix('api')
        ->group(__DIR__.'/routes/api.php');

        //resource view add
        view()->addNamespace('View', __DIR__.'/resources/views');

        //config add
        app('config')->set('kakaoPayFace', require __DIR__.'/config/kakaoPayFace.php');
    }
}