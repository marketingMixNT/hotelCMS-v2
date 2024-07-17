<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApartmentController;

Route::get("/", HomeController::class)->name('home.index');
Route::get("/blog", [BlogController::class, 'index'])->name('blog.index');
Route::get("/blog/{post:slug}", [BlogController::class, 'show'])->name('blog.show');
Route::get("/apartamenty", [ApartmentController::class, 'index'])->name('apartment.index');
Route::get("/apartament/{apartment:slug}", [ApartmentController::class, 'show'])->name('apartment.show');
