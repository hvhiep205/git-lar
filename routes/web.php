<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PageController;
use App\Http\Controllers\finderController;
Route::get('/viewer',[App\Http\Controllers\finderController::class,'display']);// blade1
Route::get('/viewer',[App\Http\Controllers\PageController::class,'getIndex']);
Route::get('/trangchu',[PageController::class,'getIndex']);
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/index', [PageController::class, 'index']);
Route::get('/', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);