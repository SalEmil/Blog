<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', Admin\Main\IndexController::class)->name('admin.main.index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', Admin\Category\IndexController::class)->name('admin.category.index');
    Route::get('/create', Admin\Category\CreateController::class)->name('admin.category.create');
    Route::post('/', Admin\Category\StoreController::class)->name('admin.category.store');
    Route::get('/{category}', Admin\Category\ShowController::class)->name('admin.category.show');
    Route::get('/{category}/edit', Admin\Category\EditController::class)->name('admin.category.edit');
    Route::patch('/{category}', Admin\Category\UpdateController::class)->name('admin.category.update');
    Route::delete('/{category}', Admin\Category\StoreController::class)->name('admin.category.delete');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', Admin\Tag\IndexController::class)->name('admin.tag.index');
    Route::get('/create', Admin\Tag\CreateController::class)->name('admin.tag.create');
    Route::post('/', Admin\Tag\StoreController::class)->name('admin.tag.store');
    Route::get('/{tag}', Admin\Tag\ShowController::class)->name('admin.tag.show');
    Route::get('/{tag}/edit', Admin\Tag\EditController::class)->name('admin.tag.edit');
    Route::patch('/{tag}', Admin\Tag\UpdateController::class)->name('admin.tag.update');
    Route::delete('/{tag}', Admin\Tag\StoreController::class)->name('admin.tag.delete');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', Admin\Post\IndexController::class)->name('admin.post.index');
    Route::get('/create', Admin\Post\CreateController::class)->name('admin.post.create');
    Route::post('/', Admin\Post\StoreController::class)->name('admin.post.store');
    Route::get('/{post}', Admin\Post\ShowController::class)->name('admin.post.show');
    Route::get('/{post}/edit', Admin\Post\EditController::class)->name('admin.post.edit');
    Route::patch('/{post}', Admin\Post\UpdateController::class)->name('admin.post.update');
    Route::delete('/{post}', Admin\Post\StoreController::class)->name('admin.post.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', Admin\User\IndexController::class)->name('admin.user.index');
    Route::get('/create', Admin\User\CreateController::class)->name('admin.user.create');
    Route::post('/', Admin\User\StoreController::class)->name('admin.user.store');
    Route::get('/{user}', Admin\Post\ShowController::class)->name('admin.user.show');
    Route::get('/{user}/edit', Admin\Post\EditController::class)->name('admin.user.edit');
    Route::patch('/{user}', Admin\Post\UpdateController::class)->name('admin.user.update');
    Route::delete('/{user}', Admin\Post\StoreController::class)->name('admin.user.delete');
});
