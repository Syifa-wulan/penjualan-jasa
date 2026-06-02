@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">

<style>
    .navbar,
    .main-navbar,
    .main-sidebar,
    .sidebar,
    nav {
        display: none !important;
    }

    .main-content {
        padding-left: 30px !important;
        padding-right: 30px !important;
        padding-top: 40px !important;
        width: 100% !important;
    }

    .main-footer {
        display: none !important;
    }
</style>

@endpush

@section('content')

<div class="main-content">
    <section class="section">

```
    <div class="section-header">
        <h1>Riwayat Pesanan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ route('pages.beranda.index') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Riwayat Pesanan</div>
        </div>
    </div>

    <div class="section-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <i class="fas fa-check-circle mr-1"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if(isset($customer) && $customer && count($orders) > 0)
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h4 class="text-dark font-weight-bold">
                        <i class="fas fa-history mr-2 text-primary"></i>
                        Riwayat Pesanan — {{ $customer->name }}
                    </h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Order</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-center">Invoice</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $i => $order)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}
                                        </td>

                                        <td>
                                            @foreach($order->details as $detail)
                                                <span class="badge badge-light">
                                                    {{ $detail->product->name ?? '-' }}
                                                    x{{ $detail->quantity }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <td>
                                            @php
                                                $statusBadge = match($order->status) {
                                                    'Completed' => 'badge-success',
                                                    'Processing' => 'badge-info',
                                                    'Review' => 'badge-warning',
                                                    'Pending' => 'badge-light',
                                                    'Cancelled' => 'badge-danger',
                                                    default => 'badge-secondary'
                                                };
                                            @endphp

                                            <span class="badge {{ $statusBadge }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>

                                        <td class="text-right font-weight-bold">
                                            Rp. {{ number_format($order->total, 0, ',', '.') }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('pages.orders.invoice', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @else
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-history fa-3x text-muted mb-3"></i>
                    <h5>Belum Ada Riwayat Pesanan</h5>
                    <p class="text-muted mb-0">
                        Riwayat pesanan akan muncul di sini setelah pelanggan melakukan pemesanan.
                    </p>
                </div>
            </div>
        @endif

    </div>

</section>
```

</div>
@endsection