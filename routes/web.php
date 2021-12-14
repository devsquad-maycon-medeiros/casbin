<?php

use App\Http\Livewire\Sections;
use App\Http\Livewire\Articles;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('sections')->name('sections.')->group(function () {
        Route::middleware(['enforcer:section,read'])->get('/', Sections\Index::class)->name('index');
        Route::middleware(['enforcer:section,create'])->get('create', Sections\Form::class)->name('create');
        Route::middleware(['enforcer:section,update'])->get('{section}/edit', Sections\Form::class)->name('edit');
    });

    Route::prefix('articles')->name('articles.')->group(function () {
        Route::get('', Articles\Index::class)->name('index');
        Route::middleware(['enforcer:article,create'])->get('create', Articles\Form::class)->name('create');
        Route::middleware(['enforcer:article,update'])->get('{article}/edit', Articles\Form::class)->name('edit');
    });
});
