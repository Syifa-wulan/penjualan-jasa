<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Order;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        $totalSales = Order::sum('total');
        $activeAppsCount = Product::count();
        return view('pages.products.index', compact('products', 'totalSales', 'activeAppsCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'views' => rand(100, 300),
            'rating' => 5.0
        ]);

        return redirect()->route('pages.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('pages.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('pages.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}