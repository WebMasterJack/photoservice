<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::post('/login',[UserController::class,'login']);
Route::post('/signup',[UserController::class,'signup']);
Route::get('/search',[UserController::class,'search']);

Route::get('/photo',[PostController::class,'all']);

Route::get('/photo/{id}',[PostController::class,'byid']);
Route::middleware('bearer')->group(function(){
    Route::post('/logout',[UserController::class,'logout']);
    Route::post('/photo',[PostController::class,'store']);
    Route::post('/photo/{id}',[PostController::class,'update']);
    Route::delete('/photo/{id}',[PostController::class,'destroy']);
    
});
