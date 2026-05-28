<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $products = Product::all();
        $orders = [];

        // SIMPAN DATA
        if ($request->isMethod('post')) {

            // VALIDASI
            if (!$request->products) {
                return back()->with('error', 'Pilih layanan dulu');
            }

            $token = Str::random(10);

            // CEK CUSTOMER BERDASARKAN EMAIL
            $customer = Customer::where('email', $request->email)->first();

            if (!$customer) {
                $customer = Customer::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'token' => $token
                ]);
            }

            // BUAT ORDER
            $order = Order::create([
                'customer_id' => $customer->id,
                'order_date' => now(),
                'total' => 0
            ]);

            $total = 0;

            // SIMPAN DETAIL ORDER
            foreach ($request->products as $item) {

                // CEK ADA ID
                if (!isset($item['id'])) continue;

                $product = Product::find($item['id']);

                // CEK PRODUK ADA
                if (!$product) continue;

                $qty = $item['qty'] ?? 1;

                $subtotal = $product->price * $qty;

                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'subtotal' => $subtotal
                ]);

                $total += $subtotal;
            }

            $order->update(['total' => $total]);

            return redirect('/order?token=' . $customer->token);
        }

        // AMBIL DATA BERDASARKAN TOKEN
        if ($request->token) {
            $customer = Customer::where('token', $request->token)->first();

            if ($customer) {
                $orders = Order::where('customer_id', $customer->id)->get();
            }
        }

        return view('pages.order', compact('products', 'orders'));
    }

    public function invoice($id)
        {
            $order = Order::with(['customer', 'details.product'])->find($id);
            
            if (!$order) {
                return redirect('/order');
            }

            return view('pages.order_detail', compact('order'));
        }

    public function home()
        {
            return view('pages.beranda.index');
        }

    public function about()
        {
            return view('pages.about');
        }

    public function services()
        {
            return view('pages.services');
        }

    public function portfolio()
        {
            return view('pages.portfolio');
        }
}   