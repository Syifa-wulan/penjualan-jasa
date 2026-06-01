@extends('layouts.app')

@section('title', 'Dashboard Overview')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Dashboard Overview</h1>
        </div>

        <div class="section-body">

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 shadow-sm card-stats-hover mb-0">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Products</h4>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between pr-3">
                                <span>{{ $totalProduct }}</span>
                                <span class="text-success text-small font-weight-bold" style="font-size: 11px;">
                                    <i class="fas fa-circle mr-1" style="font-size: 8px; vertical-align: middle;"></i> Live
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 shadow-sm card-stats-hover mb-0">
                        <div class="card-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Orders</h4>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between pr-3">
                                <span>{{ $totalOrder }}</span>
                                <span class="badge badge-pill badge-success font-weight-bold" style="font-size: 10px; padding: 3px 8px;">
                                    Real-time
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 shadow-sm card-stats-hover mb-0">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Customers</h4>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between pr-3">
                                <span>{{ $totalCustomer }}</span>
                                <span class="badge badge-pill badge-info font-weight-bold" style="font-size: 10px; padding: 3px 8px;">
                                    Active
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 shadow-sm card-stats-hover mb-0">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Income</h4>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between pr-3">
                                <span style="font-size: 14px; font-weight: bold;">Rp. {{ number_format($totalIncome, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-lg-8 mb-4">
                    <div class="card shadow-sm h-100 border-0 welcome-border-custom">
                        <div class="card-header bg-white border-0 pt-4 pb-0">
                            <h4 class="text-dark font-weight-bold">Welcome to Arcline Studio</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                Arcline Studio adalah platform penjualan jasa software yang menyediakan layanan pembuatan website, aplikasi mobile, dashboard admin, dan integrasi sistem digital modern berskala nasional.
                            </p>
                            <p class="text-muted mb-4">
                                Gunakan menu panel navigasi di sebelah kiri untuk mengelola katalog produk, memantau riwayat transaksi pesanan masuk, serta melihat direktori akun pelanggan secara mudah dan *real-time*.
                            </p>
                            
                            <div class="row pt-3 border-top">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="text-small font-weight-bold text-uppercase text-muted" style="font-size: 10px; letter-spacing: 0.5px;">Environment</div>
                                    <div class="font-weight-bold text-dark mt-1">
                                        <i class="fas fa-server mr-1 text-primary"></i> Production Mode
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="text-small font-weight-bold text-uppercase text-muted" style="font-size: 10px; letter-spacing: 0.5px;">Core Engine</div>
                                    <div class="font-weight-bold text-dark mt-1">
                                        <i class="fab fa-laravel mr-1 text-danger"></i> Laravel Framework
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-small font-weight-bold text-uppercase text-muted" style="font-size: 10px; letter-spacing: 0.5px;">UI Template</div>
                                    <div class="font-weight-bold text-dark mt-1">
                                        <i class="fas fa-layer-group mr-1 text-warning"></i> Stisla Dashboard v1.0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-header bg-white border-0 pt-4 pb-2">
                            <h4 class="text-dark font-weight-bold">Produk Terlaris</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border mb-0">
                                @forelse($bestSellers as $product)
                                    @php
                                        $iconClass = 'fa-globe';
                                        $bgClass = 'bg-light text-primary';
                                        
                                        if (str_contains(strtolower($product->name), 'mobile') || str_contains(strtolower($product->name), 'app')) {
                                            $iconClass = 'fa-mobile-alt';
                                            $bgClass = 'bg-light text-success';
                                        } elseif (str_contains(strtolower($product->name), 'dashboard') || str_contains(strtolower($product->name), 'admin')) {
                                            $iconClass = 'fa-tachometer-alt';
                                            $bgClass = 'bg-light text-warning';
                                        } elseif (str_contains(strtolower($product->name), 'seo') || str_contains(strtolower($product->name), 'marketing')) {
                                            $iconClass = 'fa-chart-line';
                                            $bgClass = 'bg-light text-info';
                                        }
                                    @endphp
                                    <li class="media align-items-center py-2">
                                        <div class="p-2 rounded mr-3 {{ $bgClass }} d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas {{ $iconClass }} fa-lg"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="float-right font-weight-bold text-success text-small">{{ $product->total_sold }} Terjual</div>
                                            <div class="media-title font-weight-bold text-dark mb-0" style="font-size: 13px;">{{ $product->name }}</div>
                                            <span class="text-small text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="py-2 text-center text-muted">Belum ada penjualan.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection