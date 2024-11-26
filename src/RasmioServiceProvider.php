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
       
        // // انتشار روت‌ها
        // $this->publishes([
        //     __DIR__ . '/../src/Http/Controllers/Api' => app_path('Http/Controllers/Api'),
        // ], 'controllers');
        
        // $this->publishes([
        //     __DIR__ . '/../routes' => app_path('routes'),
        // ], 'routes');

        // $this->publishes([
        //     __DIR__ . '/../src/Services' => app_path('Services'),
        // ], 'Services');
        
          
        // $this->publishes([
        //     __DIR__ . '/../tests' => app_path('tests'),
        // ], 'tests');


        $this->publishes([
            __DIR__ . '/../src/Http/Controllers/Api' => app_path('Http/Controllers/Api'),
            __DIR__ . '/../routes' => base_path('routes'),
            __DIR__ . '/../src/Services' => app_path('Services'),
            __DIR__ . '/../tests' => base_path('tests'),
        ], 'rasmio');  

        
        
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');


    }
}
