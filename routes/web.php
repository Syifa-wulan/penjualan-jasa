<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda.index');
})->name('pages.beranda.index');

Route::get('/products', function () {
    return view('pages.products.index');
})->name('pages.products.index');

Route::get('/orders', function () {
    return view('pages.orders.index');
})->name('pages.orders.index');

Route::get('/customers', function () {
    return view('pages.customers.index');
})->name('pages.customers.index');