<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create'])->name('index');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['index', 'edit', 'create', 'store', 'destroy']);
Route::post('user-account/{user_account}', [UserAccountController::class, 'update'])->name('user-account.update');

Route::resource('blog-post', PostController::class)->only(['index', 'create', 'store', 'show'])->middleware('auth');

Route::post('blog-post-comment', [PostCommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::get('blog-post-comment/edit/{comment}', [PostCommentController::class, 'edit'])->name('comment.edit')->middleware('auth');
Route::post('blog-post-comment/{comment}', [PostCommentController::class, 'update'])->name('comment.update')->middleware('auth');
Route::delete('blog-post-comment/{comment}', [PostCommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');


Route::get('blog-post/{blog_post}/image' , [PostImageController::class, 'create'])->name('blog-post.image.create');
Route::post('blog-post/{blog_post}/image' , [PostImageController::class, 'store'])->name('blog-post.image.store');
Route::delete('blog-post/{blog_post}/{image}' , [PostImageController::class, 'destroy'])->name('blog-post.image.destroy');