<?php

use Illuminate\Support\Facades\Route;

Route::post('/user/login', [App\Http\Controllers\api\v1\LoginController::class, 'login'])->middleware('cors');
