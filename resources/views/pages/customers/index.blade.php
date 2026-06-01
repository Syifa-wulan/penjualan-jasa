@extends('layouts.app')

@section('title', 'Customers')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer Directory</h1>
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

            <div class="row mb-4 align-items-center">
                <div class="col-md-6 col-12 mb-3 mb-md-0">
                    <p class="text-muted mb-0">Managing <span class="font-weight-bold text-dark">{{ $customers->total() }}</span> active customer accounts</p>
                </div>
            </div>

            <div class="row">
                @forelse($customers as $key => $customer)
                    @php
                        $revenue = $customer->orders_sum_total ?? 0;
                        
                        // Buat inisial dari nama customer (Max 2 Karakter)
                        $initials = '';
                        $words = explode(' ', $customer->name);
                        foreach ($words as $w) {
                            $initials .= strtoupper(substr($w, 0, 1));
                        }
                        $initials = substr($initials, 0, 2);

                        // Skema warna bg avatar yang serasi & premium
                        $bgColors = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-dark'];
                        $colorClass = $bgColors[$customer->id % count($bgColors)];
                    @endphp
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card card-primary h-100 mb-0 shadow-sm customer-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="avatar-wrapper mr-3">
                                        <figure class="avatar avatar-xl {{ $colorClass }} text-white font-weight-bold shadow-sm" data-initial="{{ $initials }}" style="width: 50px; height: 50px; line-height: 50px; font-size: 16px; margin-bottom: 0;"></figure>
                                        @if($key % 2 == 0)
                                            <div class="online-indicator" style="bottom: -2px; right: -2px;"></div>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold text-dark mb-1">{{ $customer->name }}</h6>
                                        <span class="badge badge-light text-small font-weight-bold px-2 py-0.5"><i class="fas fa-check-circle text-success mr-1"></i> Client</span>
                                    </div>
                                    <div class="ml-auto align-self-start">
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-link btn-sm p-0 text-muted" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editCustomerModal-{{ $customer->id }}"><i class="fas fa-edit mr-2 text-warning"></i> Edit Profil</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('pages.customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Pelanggan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-2 mb-3">
                                    <div class="col-12 text-left">
                                        <div class="text-small text-muted mb-1"><i class="fas fa-envelope mr-1"></i> {{ $customer->email }}</div>
                                        <div class="text-small text-muted"><i class="fas fa-phone mr-1"></i> {{ $customer->phone }}</div>
                                    </div>
                                </div>

                                <div class="row text-center pt-2 border-top">
                                    <div class="col-6 border-right">
                                        <small class="text-muted d-block text-uppercase font-weight-bold text-small mb-1" style="font-size: 10px; letter-spacing: 0.5px;">Total Projects</small>
                                        <span class="font-weight-bold text-dark mb-0"><i class="fas fa-archive text-warning mr-1"></i> {{ sprintf("%02d", $customer->orders_count) }}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block text-uppercase font-weight-bold text-small mb-1" style="font-size: 10px; letter-spacing: 0.5px;">Revenue</small>
                                        <span class="font-weight-bold text-dark mb-0"><i class="fas fa-wallet text-success mr-1"></i> Rp. {{ number_format($revenue, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center text-muted py-5">
                                <i class="fas fa-user-slash fa-3x mb-3 text-light"></i>
                                <p class="mb-0">No customers found.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-end mt-4">
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
</div>

<!-- ==========================================================================
     MODALS SECTION (DILETAKKAN DI LUAR HIERARKI CARD UNTUK MENCEGAH BUG STACKING BACKDROP)
     ========================================================================== -->

<!-- Edit Customer Modals -->
@foreach($customers as $customer)
    <div class="modal fade" id="editCustomerModal-{{ $customer->id }}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1060;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pages.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Edit Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Add Customer Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pages.customers.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Tambah Pelanggan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: John Doe" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Contoh: john@example.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="phone" class="form-control" placeholder="Contoh: 08123456789" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection