<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Central routes')->name('dashboard');
