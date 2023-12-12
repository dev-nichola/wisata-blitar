<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => response("Hello Blitar!"));


Route::prefix('/kota')->group(function()
{
    Route::get('/', [MainController::class, 'get']);
    Route::get('/', [MainController::class, 'search']);
    Route::get('/{id}', [MainController::class, 'getId']);
});

Route::prefix('/kabupaten')->group(function(){
    Route::get('/', [MainController::class, 'get']);
    Route::get('/', [MainController::class, 'search']);
    Route::get('/{id}', [MainController::class, 'getId']);
});


