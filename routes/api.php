<?php

use App\Http\Controllers\Api\AuthControlller;
use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',[AuthControlller::class,'login']);
Route::post('/register',[AuthControlller::class,'register']);


Route::middleware('auth:sanctum')->group( function () {
    Route::resource('/categories',CategoriesController::class);
});



