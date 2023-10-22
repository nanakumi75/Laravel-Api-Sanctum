<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('/employees',[AuthController::class,'store']);
    Route::get('/employees',[AuthController::class,'index']);
    Route::get('/employees/{id}',[AuthController::class,'show']);
    Route::put('/employees/{id}',[AuthController::class,'update']);
    Route::get('/employees/search/{name}',[AuthController::class,'search']);
    Route::delete('/employees/{id}',[AuthController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
