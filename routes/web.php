<?php

use App\Http\Livewire\Sections;
use App\Http\Livewire\Articles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard','dashboard')->name('dashboard');

    Route::middleware(['enforcer:section,read'])->get('sections', Sections\Index::class);

    Route::get('articles', Articles\Index::class);
});
