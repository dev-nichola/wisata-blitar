<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/', fn() => response("Hello Blitar!"));

Route::prefix('/kota')->group(function()
{
    Route::get('/kota', [MainController::class, 'get']);
    Route::get('/kota', [MainController::class, 'search']);
    Route::get('/{id}', [MainController::class, 'getId'])->where("id", "[0-9]+");
});

Route::prefix('/kabupaten')->group(function(){
    Route::get('/kabupaten', [MainController::class, 'get']);
    Route::get('/kabupaten', [MainController::class, 'search']);
    Route::get('/kabupaten/{id}', [MainController::class, 'getId'])->where("id", "[0-9]+");
});



