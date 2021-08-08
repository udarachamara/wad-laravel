<?php

use Illuminate\Support\Facades\Route;

Route::post('/user/auth', [App\Http\Controllers\api\v1\LoginController::class, 'auth'])->middleware('cors');

Route::post('/user/register', [App\Http\Controllers\api\v1\LoginController::class, 'register'])->middleware('cors');

Route::get('/user/authUser', [App\Http\Controllers\api\v1\LoginController::class, 'authUser'])->middleware(['cors', 'user_accessible']);

Route::get('/user/{id}', [App\Http\Controllers\api\v1\LoginController::class, 'getUserById'])->middleware(['cors', 'user_accessible']);