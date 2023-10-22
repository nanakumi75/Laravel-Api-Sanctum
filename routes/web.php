<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProfileUploadController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/account',function(){
    return view('account');
})->middleware('isloggedout');

Route::get('/register',function(){
    return view('register');
})->middleware('isloggedin');

Route::get('/login',function(){
    return view('login');
})->middleware('isloggedin');

Route::get('/students',function(){
    return view('students');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/forget',function(){
    return view('forget');
})->middleware('isloggedin');

Route::get('/createnewpassword',function(){
    return view('createnewpassword');
})->middleware('isloggedin');

Route::get('/upload',function(){
    return view('upload');
})->middleware('isloggedout');

Route::get('/edit',function(){
    return view('edit');
})->middleware('isloggedout');

Route::get('/user/verify/{token}',[AccountController::class,'verify']);
Route::post('/login',[AccountController::class,'login']);
Route::get('/account',[AccountController::class,'loggedin']);
Route::get('/logout',[AccountController::class,'logout']);
Route::get('/edit/{id}',[AccountController::class,'edit']);
Route::post('/edit',[AccountController::class,'saveupdates']);
Route::get('/delete',[AccountController::class,'deleteuser']);
Route::get('/',[ApiController::class,'fetch']);
Route::post('/forget',[AccountController::class,'passwordforget']);
Route::post('/createnewpassword',[AccountController::class,'createnewpassword']);


Route::post('/upload',[ProfileUploadController::class,'upload']);


Route::controller(AccountController::class)->group(function(){

});
