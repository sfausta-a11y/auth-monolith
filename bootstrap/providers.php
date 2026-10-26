<?php

use App\Providers\AppServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    Modules\Auth\Providers\AuthServiceProvider::class,
    Modules\Product\Providers\ProductServiceProvider::class, // Tambahkan baris ini
];