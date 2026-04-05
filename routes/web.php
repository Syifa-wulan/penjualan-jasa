<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;

Route::get('/', [OrderController::class, 'home']);
Route::get('/about', [OrderController::class, 'about']);
Route::get('/services', [OrderController::class, 'services']);
Route::get('/portfolio', [OrderController::class, 'portfolio']);
Route::get('/order/{id}', [OrderController::class, 'invoice']);
Route::get('/order', [OrderController::class, 'home']);

Route::match(['get','post'], '/order', [OrderController::class, 'order']);