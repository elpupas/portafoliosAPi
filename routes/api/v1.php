<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});
