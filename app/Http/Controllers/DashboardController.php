<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalCustomer' => Customer::count(),
            'totalProduct' => Product::count(),
            'totalOrder' => Order::count(),
            'totalIncome' => Order::sum('total')
        ]);
    }
}