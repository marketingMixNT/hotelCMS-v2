<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", HomeController::class)->name('home.index');
Route::get("/blog", [BlogController::class, 'index'])->name('blog.index');
Route::get("/blog/{post:slug}", [BlogController::class, 'show'])->name('blog.show');
