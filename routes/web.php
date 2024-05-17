<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

Route::resource('blog-post', PostController::class)->only(['index', 'create', 'store', 'show'])->middleware('auth');

Route::post('blog-post-comment', [PostCommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::get('blog-post-comment/edit/{comment}', [PostCommentController::class, 'edit'])->name('comment.edit')->middleware('auth');
Route::post('blog-post-comment/{comment}', [PostCommentController::class, 'update'])->name('comment.update')->middleware('auth');
Route::delete('blog-post-comment/{comment}', [PostCommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');