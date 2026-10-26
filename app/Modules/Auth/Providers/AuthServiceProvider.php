<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Muat Route modul Auth secara otomatis
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // 2. Muat Views (namespace auth::) & Migrations
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'auth');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    public function register()
    {
        //
    }
}