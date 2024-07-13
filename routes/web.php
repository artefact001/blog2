<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::resource('articles', ArticleController::class);
Route::resource('comments', CommentController::class)->only(['update', 'destroy']);

Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('articles/{article}/comments', [CommentController::class, 'index'])->name('comments.index');




use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::resource('articles', ArticleController::class);

Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('articles/{article}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('articles/{article}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('articles/{article}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
