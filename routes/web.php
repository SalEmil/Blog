<?php

use App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\Main\IndexController::class)->name('main.index');

Route::get('postss/', Controllers\Post\IndexController::class)->name('post.index');
Route::get('postss/{post}', Controllers\Post\ShowController::class)->name('post.show');
Route::post('postss/{post}/comments', Controllers\Post\Comment\StoreController::class)->name('post.comment.store');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/personal/main', Controllers\Personal\Main\IndexController::class)->name('personal.main.index');

    Route::get('/personal/likeds', Controllers\Personal\Liked\IndexController::class)->name('personal.liked.index');
    Route::delete('/personal/likeds/{post}', Controllers\Personal\Liked\DeleteController::class)->name('personal.liked.delete');

    Route::get('/personal/comments', Controllers\Personal\Comment\IndexController::class)->name('personal.comment.index');
    Route::get('/personal/comments/{comment}/edit', Controllers\Personal\Comment\EditController::class)->name('personal.comment.edit');
    Route::patch('/personal/comments/{comment}', Controllers\Personal\Comment\UpdateController::class)->name('personal.comment.update');
    Route::delete('/personal/comments/{comment}', Controllers\Personal\Comment\DeleteController::class)->name('personal.comment.delete');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
