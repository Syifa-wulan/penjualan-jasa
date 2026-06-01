@extends('layouts.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-action">
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#addProductModal"><i class="fas fa-plus"></i> New Product</button>
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

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="mb-4">
                <p class="text-muted mb-0">Manage and monitor your active software portfolio in real-time.</p>
            </div>

            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-sm mb-3 mb-lg-0">
                        <div class="card-icon bg-primary"><i class="fas fa-cubes"></i></div>
                        <div class="card-wrap">
                            <div class="card-header"><h4>Active Apps</h4></div>
                            <div class="card-body">{{ $activeAppsCount }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-sm mb-3 mb-lg-0">
                        <div class="card-icon bg-success"><i class="fas fa-wallet"></i></div>
                        <div class="card-wrap">
                            <div class="card-header"><h4>Total Revenue</h4></div>
                            <div class="card-body" style="font-size: 15px; font-weight: bold; line-height: 2.2;">Rp. {{ number_format($totalSales, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-sm mb-3 mb-lg-0">
                        <div class="card-icon bg-info"><i class="fas fa-eye"></i></div>
                        <div class="card-wrap">
                            <div class="card-header"><h4>Total Views</h4></div>
                            <div class="card-body">{{ number_format(\App\Models\Product::sum('views')) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow-sm mb-3 mb-lg-0">
                        <div class="card-icon bg-warning"><i class="fas fa-star"></i></div>
                        <div class="card-wrap">
                            <div class="card-header"><h4>Rating</h4></div>
                            <div class="card-body">{{ number_format(\App\Models\Product::avg('rating'), 1) }}/5.0</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
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

                        $description = $product->description ?? 'Layanan pembuatan software premium yang dikembangkan secara custom dengan performa tinggi, desain UI/UX modern, dan integrasi sistem yang aman.';
                        $viewsText = number_format($product->views);
                    @endphp

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm product-card-hover border-0">
                            <div class="card-body d-flex flex-column justify-content-between p-4">
                                <div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="p-3 rounded-circle {{ $bgClass }} d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas {{ $iconClass }} fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <span class="badge badge-light text-muted text-uppercase font-weight-bold text-small">Software Jasa</span>
                                        </div>
                                    </div>

                                    <h5 class="card-title text-dark font-weight-bold mb-2" style="font-size: 16px;">{{ $product->name }}</h5>
                                    <p class="card-text text-muted text-small mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; min-height: 54px;">
                                        {{ $description }}
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <span class="font-weight-bold h6 mb-0 text-primary">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <div class="d-flex align-items-center text-muted">
                                        <span class="mr-3 text-small"><i class="fas fa-eye mr-1"></i> {{ $viewsText }}</span>
                                        <button class="btn btn-link btn-sm p-0 text-muted" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProductModal-{{ $product->id }}"><i class="fas fa-pen mr-2 text-warning"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('pages.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash-alt mr-2"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center text-muted py-5">
                                <i class="fas fa-box-open fa-3x mb-3 text-light"></i>
                                <p class="mb-0">No products found.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-end mt-4">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
</div>

<!-- ==========================================================================
     MODALS SECTION (DILETAKKAN DI LUAR HIERARKI CARD UNTUK MENCEGAH BUG STACKING BACKDROP)
     ========================================================================== -->

<!-- Edit Product Modals -->
@foreach($products as $product)
    @php
        $description = $product->description ?? 'Layanan pembuatan software premium yang dikembangkan secara custom dengan performa tinggi, desain UI/UX modern, dan integrasi sistem yang aman.';
    @endphp
    <div class="modal fade" id="editProductModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1060;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('pages.products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Edit Layanan/Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Layanan</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Jasa (Rupiah)</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Lengkap Jasa</label>
                            <textarea name="description" class="form-control" rows="4" style="height: 100px;" required>{{ $description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('pages.products.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Tambah Layanan Jasa Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Pembuatan Website E-Learning" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jasa (Rupiah)</label>
                        <input type="number" name="price" class="form-control" placeholder="Contoh: 3000000" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Lengkap Jasa</label>
                        <textarea name="description" class="form-control" placeholder="Tuliskan deskripsi lengkap, keunggulan, dan teknologi yang digunakan..." rows="4" style="height: 100px;" required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection