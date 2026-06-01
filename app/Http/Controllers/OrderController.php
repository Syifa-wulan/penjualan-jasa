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
        $customer = null;

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
                'total' => 0,
                'status' => 'Pending'
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

            return redirect('/order?token=' . $customer->token)->with('success', 'Pesanan berhasil dibuat! Berikut riwayat pesanan Anda.');
        }

        // AMBIL DATA BERDASARKAN TOKEN
        if ($request->token) {
            $customer = Customer::where('token', $request->token)->first();

            if ($customer) {
                $orders = Order::with('details.product')->where('customer_id', $customer->id)->latest()->get();
            }
        }

        return view('pages.order', compact('products', 'orders', 'customer'));
    }

    public function index()
    {
        $orders = Order::with('customer', 'details.product')->latest()->paginate(10);
        return view('pages.orders.index', compact('orders'));
    }

    public function invoice($id)
    {
        // 1. Cari data order berdasarkan ID beserta data customernya
        $order = Order::with('customer')->find($id);
        
        if (!$order) {
            return redirect('/order')->with('error', 'Pesanan tidak ditemukan.');
        }

        // 2. Ambil token dari customer yang punya orderan ini
        $token = $order->customer->token;

        // 3. REDIRECT (Alihkan) langsung ke halaman order utama dengan membawa tokennya
        // Ditambah pesan sukses agar pelanggan tahu invoice mana yang sedang aktif
        return redirect('/order?token=' . $token)->with('success', 'Menampilkan data pesanan #' . $order->id);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Review,Processing,Completed,Cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan #' . $order->id . ' berhasil diubah menjadi ' . $request->status . '.');
    }
}