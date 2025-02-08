<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\Category\CategoryCreateController;
use App\Http\Controllers\Admin\Category\CategoryDestroyController;
use App\Http\Controllers\Admin\Category\CategoryEditController;
use App\Http\Controllers\Admin\Category\CategoryIndexController;
use App\Http\Controllers\Admin\Category\CategoryShowController;
use App\Http\Controllers\Admin\Category\CategoryStoreController;
use App\Http\Controllers\Admin\Category\CategoryUpdateController;
use App\Http\Controllers\Admin\Post\PostCreateController;
use App\Http\Controllers\Admin\Post\PostDestroyController;
use App\Http\Controllers\Admin\Post\PostEditController;
use App\Http\Controllers\Admin\Post\PostIndexController;
use App\Http\Controllers\Admin\Post\PostShowController;
use App\Http\Controllers\Admin\Post\PostStoreController;
use App\Http\Controllers\Admin\Post\PostUpdateController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagDestroyController;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagShowController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::namespace('Main')->group(function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::namespace('app/Http/Controllers/Admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminIndexController::class, '__invoke']);

    Route::namespace('Category')->prefix('categories')->group(function () {
        Route::get('/', [CategoryIndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CategoryCreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/store', [CategoryStoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [CategoryShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [CategoryEditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryUpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [CategoryDestroyController::class, '__invoke'])->name('admin.category.delete');
    });
    Route::namespace('Tag')->prefix('tag')->group(function () {
        Route::get('/', [TagIndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [TagCreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/store', [TagStoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [TagShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagEditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagUpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagDestroyController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::namespace('Post')->prefix('post')->group(function () {
        Route::get('/', [PostIndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [PostCreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/store', [PostStoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [PostShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostEditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [PostUpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [PostDestroyController::class, '__invoke'])->name('admin.post.delete');
    });
});
