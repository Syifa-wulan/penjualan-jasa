@extends('layouts.app')

@section('title', 'Orders')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Recent Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('pages.beranda.index') }}">Home</a></div>
                <div class="breadcrumb-item">Orders</div>
            </div>
        </div>

        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Data Orders</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead>
                                <tr>
                                    <th>Customer & Project</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th class="text-right">Total Amount</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                           <tbody>
    @forelse($orders as $order)
        <tr>
            <td>
                <div class="d-flex align-items-center py-1">
                    <figure class="avatar mr-3 bg-primary text-white" data-initial="{{ strtoupper(substr($order->customer->name ?? 'A', 0, 1)) }}"></figure>
                    <div>
                        <div class="font-weight-bold">{{ $order->customer->name ?? 'N/A' }}</div>
                        <div class="text-muted text-small">
                            {{ $order->details->first()->product->name ?? 'N/A' }}
                            @if($order->details->count() > 1)
                                <span class="text-muted text-small">(+{{ $order->details->count() - 1 }} lainnya)</span>
                            @endif
                        </div>
                    </div>
                </div>
            </td>
            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
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
            <td class="text-right font-weight-bold text-primary">
                Rp. {{ number_format($order->total, 0, ',', '.') }}
            </td>
            <td class="text-center">
                <a href="{{ route('pages.orders.invoice', $order->id) }}" class="btn btn-primary btn-sm mr-1" title="Lihat Invoice">
                    <i class="fas fa-file-invoice"></i>
                </a>

                <div class="dropdown d-inline">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Ubah Status</div>
                        @foreach(['Pending', 'Review', 'Processing', 'Completed', 'Cancelled'] as $status)
                            @if($order->status !== $status)
                                <form action="{{ route('pages.orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $status }}">
                                    <button type="submit" class="dropdown-item">
                                        @php
                                            $icon = match($status) {
                                                'Pending' => 'fa-clock text-secondary',
                                                'Review' => 'fa-search text-warning',
                                                'Processing' => 'fa-spinner text-info',
                                                'Completed' => 'fa-check-circle text-success',
                                                'Cancelled' => 'fa-times-circle text-danger',
                                                default => 'fa-circle text-muted'
                                            };
                                        @endphp
                                        <i class="fas {{ $icon }} mr-2"></i> {{ $status }}
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-muted">No orders found.</td>
        </tr>
    @endforelse
</tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection