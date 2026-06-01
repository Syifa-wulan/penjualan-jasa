<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

// Public Landing Page (Accessible by all)
Route::get('/', [DashboardController::class, 'landing'])->name('pages.landing');

// Auth Routes (Guests only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Admin Routes (Authenticated only)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard (Moved to /dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('pages.beranda.index');

    // Products CRUD
    Route::get('/products', [ProductController::class, 'index'])->name('pages.products.index');
    // ... rute post, put, delete produk tetap aman di sini
    Route::post('/products', [ProductController::class, 'store'])->name('pages.products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('pages.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('pages.products.destroy');

    // Orders Admin
    Route::get('/orders', [OrderController::class, 'index'])->name('pages.orders.index');
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('pages.orders.updateStatus');

    // Customers CRUD
    Route::get('/customers', [CustomerController::class, 'index'])->name('pages.customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('pages.customers.store');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('pages.customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('pages.customers.destroy');
});

// Public Customer Facing Routes
Route::any('/order', [OrderController::class, 'order'])->name('pages.order');

// 🟢 PERBAIKAN: Ubah parameter invoice dari ID ke Token agar sinkron dengan fungsi halaman order publik Anda
Route::get('/orders/invoice/{id}', [OrderController::class, 'invoice'])->name('pages.orders.invoice');