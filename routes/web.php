<?php

use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke halaman login modul Auth
Route::get('/', function () {
    return redirect()->route('login');
});