<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\MemoryController as PublicMemoryController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Admin;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/memories', [HomeController::class, 'memories'])->name('memories.index');

Route::prefix('memory/{slug}')->name('memory.')->group(function () {
    Route::get('/', [PublicMemoryController::class, 'show'])->name('show');
    Route::get('/unlock', [PublicMemoryController::class, 'showUnlock'])->name('unlock');
    Route::post('/unlock', [PublicMemoryController::class, 'unlock'])->name('unlock.post');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('memory-templates', Admin\MemoryTemplateController::class);
    Route::resource('memories', Admin\MemoryController::class);
    Route::patch('memories/{memory}/publish', [Admin\MemoryController::class, 'togglePublish'])->name('memories.publish');
    Route::resource('blog', Admin\PostController::class)->parameters(['blog' => 'post']);
    Route::resource('news', Admin\NewsController::class)->parameters(['news' => 'post']);
});
