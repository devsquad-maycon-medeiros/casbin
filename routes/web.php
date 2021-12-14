<?php

use App\Http\Livewire\Sections;
use App\Http\Livewire\Articles;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('sections')->name('sections.')->group(function () {
        Route::middleware(['can:read sections'])->get('/', Sections\Index::class)->name('index');
        Route::middleware(['can:create sections'])->get('create', Sections\Form::class)->name('create');
        Route::middleware(['can:update sections'])->get('{section}/edit', Sections\Form::class)->name('edit');
    });

    Route::prefix('articles')->name('articles.')->group(function () {
        Route::middleware(['can:read articles'])->get('/', Articles\Index::class)->name('index');
        Route::middleware(['can:create articles'])->get('create', Articles\Form::class)->name('create');
        Route::middleware(['can:update articles'])->get('{article}/edit', Articles\Form::class)->name('edit');
    });
});
