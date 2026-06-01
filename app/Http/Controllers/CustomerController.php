<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount('orders')
            ->withSum('orders', 'total')
            ->paginate(9);
        return view('pages.customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:50',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'token' => \Illuminate\Support\Str::random(10)
        ]);

        return redirect()->route('pages.customers.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required|string|max:50',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('pages.customers.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('pages.customers.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}