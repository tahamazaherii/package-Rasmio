<?php

namespace Taha\Rasmio;

use Illuminate\Support\ServiceProvider;

class RasmioServiceProvider extends ServiceProvider
{
    public function register()
    {
        // ثبت bindings و سرویس‌ها در اینجا
    }

    public function boot()
    {
        // // انتشار فایل‌های پیکربندی، ویوها و روت‌ها
        // $this->mergeConfigFrom(
        //     __DIR__ . '/../config/Rasmio.php', 'Rasmio'
        // );

        // انتشار روت‌ها
        $this->publishes([
            __DIR__ . '/../src/Http/Controllers/Api' => app_path('Http/Controllers'),
        ], 'controllers');
        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');


    }
}
