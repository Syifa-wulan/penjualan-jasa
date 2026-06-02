@extends('layouts.app')

@section('title', 'Buat Pesanan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">
    <style>
        /* ==========================================================================
           HAPUS NAVBAR, SIDEBAR, DAN FOOTER ADMIN KHUSUS HALAMAN INI
           ========================================================================== */
        .navbar, 
        .main-navbar, 
        .main-sidebar, 
        .sidebar,
        nav,
        .main-footer { 
            display: none !important; 
        }
        
        /* Geser konten ke kiri penuh & hilangkan gap kosong bekas sidebar */
        .main-content { 
            padding-left: 30px !important; 
            padding-right: 30px !important;
            padding-top: 40px !important;
            width: 100% !important;
        }
        /* ========================================================================== */

        .service-card { cursor: pointer; transition: all 0.3s ease; border: 2px solid transparent; }
        .service-card:hover { border-color: #6777ef; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(103,119,239,.15) !important; }
        .service-card.selected { border-color: #6777ef; background-color: #f8f9ff; }
        .service-card .check-icon { display: none; position: absolute; top: 10px; right: 10px; }
        .service-card.selected .check-icon { display: block; }
        .qty-input { width: 60px; text-align: center; }
    </style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Formulir Pemesanan Jasa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('pages.beranda.index') }}">Home</a></div>
                <div class="breadcrumb-item">Buat Pesanan</div>
            </div>
        </div>

        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                    </div>
                </div>
            @endif

            {{-- RIWAYAT PESANAN (jika ada token) --}}
            @if(isset($customer) && $customer && count($orders) > 0)
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white border-0 pt-4 pb-2">
                        <h4 class="text-dark font-weight-bold"><i class="fas fa-history mr-2 text-primary"></i> Riwayat Pesanan — {{ $customer->name }}</h4>
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
                                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                                            <td>
                                                @foreach($order->details as $detail)
                                                    <span class="badge badge-light">{{ $detail->product->name ?? '-' }} x{{ $detail->quantity }}</span>
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
                                                <span class="badge {{ $statusBadge }}">{{ $order->status }}</span>
                                            </td>
                                            <td class="text-right font-weight-bold">Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pages.orders.invoice', $order->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-file-invoice"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            {{-- FORMULIR PEMESANAN --}}
            <form action="{{ route('pages.order') }}" method="POST" id="orderForm">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0 pt-4 pb-2">
                                <h4 class="text-dark font-weight-bold"><i class="fas fa-concierge-bell mr-2 text-primary"></i> Pilih Layanan Jasa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row" id="serviceList">
                                    @foreach($products as $product)
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="card service-card shadow-sm h-100 position-relative" data-id="{{ $product->id }}" data-price="{{ $product->price }}" data-name="{{ $product->name }}">
                                                <div class="check-icon">
                                                    <span class="badge badge-primary"><i class="fas fa-check"></i></span>
                                                </div>
                                                <div class="card-body p-3">
                                                    <h6 class="font-weight-bold text-dark mb-1" style="font-size: 13px;">{{ $product->name }}</h6>
                                                    <div class="text-primary font-weight-bold mb-2">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
                                                    <p class="text-muted mb-2" style="font-size: 11px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $product->description }}</p>
                                                    <div class="mt-2 qty-section" style="display: none;">
                                                        <label class="text-small text-muted mb-1 d-block">Jumlah:</label>
                                                        <input type="number" class="form-control form-control-sm qty-input" value="1" min="1" max="10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="hiddenInputs"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0 pt-4 pb-2">
                                <h4 class="text-dark font-weight-bold"><i class="fas fa-user mr-2 text-primary"></i> Data Pelanggan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Anda" value="{{ $customer->name ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="email@contoh.com" value="{{ $customer->email ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxxx" value="{{ $customer->phone ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0 pt-4 pb-2">
                                <h4 class="text-dark font-weight-bold"><i class="fas fa-receipt mr-2 text-success"></i> Ringkasan Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <div id="orderSummary">
                                    <p class="text-muted text-center py-3" id="emptyMsg"><i class="fas fa-shopping-cart mr-1"></i> Belum ada layanan dipilih</p>
                                    <ul class="list-unstyled mb-0" id="summaryList" style="display: none;"></ul>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between font-weight-bold">
                                    <span>Grand Total</span>
                                    <span class="text-primary" id="grandTotal">Rp. 0</span>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" id="submitBtn" disabled>
                                    <i class="fas fa-paper-plane mr-1"></i> Kirim Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.service-card');
    const hiddenInputs = document.getElementById('hiddenInputs');
    const summaryList = document.getElementById('summaryList');
    const emptyMsg = document.getElementById('emptyMsg');
    const grandTotal = document.getElementById('grandTotal');
    const submitBtn = document.getElementById('submitBtn');

    function formatRupiah(num) {
        return 'Rp. ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function updateSummary() {
        const selected = document.querySelectorAll('.service-card.selected');
        hiddenInputs.innerHTML = '';
        summaryList.innerHTML = '';
        let total = 0;

        if (selected.length === 0) {
            emptyMsg.style.display = 'block';
            summaryList.style.display = 'none';
            submitBtn.disabled = true;
        } else {
            emptyMsg.style.display = 'none';
            summaryList.style.display = 'block';
            submitBtn.disabled = false;
        }

        selected.forEach(function(card, index) {
            const id = card.dataset.id;
            const name = card.dataset.name;
            const price = parseInt(card.dataset.price);
            const qty = parseInt(card.querySelector('.qty-input').value) || 1;
            const subtotal = price * qty;
            total += subtotal;

            // Hidden Inputs
            hiddenInputs.innerHTML += '<input type="hidden" name="products[' + index + '][id]" value="' + id + '">';
            hiddenInputs.innerHTML += '<input type="hidden" name="products[' + index + '][qty]" value="' + qty + '">';

            // Summary List
            summaryList.innerHTML += '<li class="d-flex justify-content-between py-1 border-bottom"><span class="text-small">' + name + ' x' + qty + '</span><span class="text-small font-weight-bold">' + formatRupiah(subtotal) + '</span></li>';
        });

        grandTotal.textContent = formatRupiah(total);
    }

    cards.forEach(function(card) {
        card.addEventListener('click', function(e) {
            if (e.target.classList.contains('qty-input')) return;
            card.classList.toggle('selected');
            const qtySection = card.querySelector('.qty-section');
            qtySection.style.display = card.classList.contains('selected') ? 'block' : 'none';
            if (!card.classList.contains('selected')) {
                card.querySelector('.qty-input').value = 1;
            }
            updateSummary();
        });

        card.querySelector('.qty-input').addEventListener('input', function() {
            updateSummary();
        });
    });
});
</script>
@endpush