<?php

use App\Http\Livewire;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('sections')->name('sections.')->group(function () {
        Route::middleware(['can:read sections'])->get('/', Livewire\Sections\Index::class)->name('index');
        Route::middleware(['can:create sections'])->get('create', Livewire\Sections\Form::class)->name('create');
        Route::middleware(['can:update sections'])->get('{section}/edit', Livewire\Sections\Form::class)->name('edit');
    });

    Route::prefix('articles')->name('articles.')->group(function () {
        Route::middleware(['can:read articles'])->get('/', Livewire\Articles\Index::class)->name('index');
        Route::middleware(['can:create articles'])->get('create', Livewire\Articles\Form::class)->name('create');
        Route::middleware(['can:update articles'])->get('{article}/edit', Livewire\Articles\Form::class)->name('edit');
    });

    Route::middleware('role:Super Admin')->group(function () {
        Route::get('users', Livewire\Users\Index::class)->name('users.index');
        Route::get('roles-and-permissions', Livewire\RolesAndPermissions\Index::class)
            ->name('roles-and-permissions.index');
    });
});
