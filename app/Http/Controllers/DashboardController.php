<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailOrder;

class DashboardController extends Controller
{
    /**
     * Tampilkan Landing Page Publik.
     */
    public function landing()
    {
        $products = Product::all();

        // Ambil produk terlaris (best sellers)
        $topSold = DetailOrder::select('product_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        $bestSellers = $topSold->map(function ($item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->total_sold = $item->total_sold;
            }
            return $product;
        })->filter();

        $totalProduct = Product::count();
        $totalCustomer = Customer::count();
        // Hanya menghitung order yang sukses atau completed
        $totalOrder = Order::where('status', 'Completed')->count();
        $averageRating = number_format(Product::avg('rating') ?? 4.8, 1);

        return view('pages.landing', compact(
            'products', 
            'bestSellers', 
            'totalProduct', 
            'totalCustomer', 
            'totalOrder', 
            'averageRating'
        ));
    }

    /**
     * Tampilkan Dashboard Admin.
     */
    public function index()
    {
        $latestOrder = Order::with('customer')->latest()->first();
        $latestCustomer = Customer::latest()->first();
        $latestProduct = Product::latest('updated_at')->first();

        // Safe dynamic query for best selling products
        $topSold = DetailOrder::select('product_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        $bestSellers = $topSold->map(function ($item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->total_sold = $item->total_sold;
            }
            return $product;
        })->filter();

        return view('pages.beranda.index', [
            'totalCustomer' => Customer::count(),
            'totalProduct' => Product::count(),
            'totalOrder' => Order::count(),
            'totalIncome' => Order::sum('total'),
            'latestOrder' => $latestOrder,
            'latestCustomer' => $latestCustomer,
            'latestProduct' => $latestProduct,
            'bestSellers' => $bestSellers
        ]);
    }
}