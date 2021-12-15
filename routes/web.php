<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome')->name('welcome');

Route::get('/', fn () => 'Central routes')->name('dashboard');
