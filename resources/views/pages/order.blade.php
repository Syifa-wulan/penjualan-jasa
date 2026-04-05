@include('layout.navbar')

<style>
    body {
        background-color: #f5f7fa;
    }

    /* HEADER CARD */
    .header-gradient {
        background: linear-gradient(90deg, #6366f1, #4f46e5);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 15px 20px;
    }

    /* BUTTON */
    .btn-main {
        background: linear-gradient(90deg, #6366f1, #4f46e5);
        color: white;
        border: none;
    }

    .btn-main:hover {
        opacity: 0.9;
    }

    /* CARD */
    .card {
        border-radius: 12px;
        border: none;
    }

    /* ORDER ITEM */
    .order-item {
        border-left: 4px solid #6366f1;
        border-radius: 10px;
        background: white;
    }

    .total-text {
        color: #4f46e5;
        font-weight: bold;
    }
</style>

<div class="container mt-5">

    <!-- FORM ORDER -->
    <div class="card shadow-sm mb-4">
        <div class="header-gradient">
            <h4 class="mb-0">Order Layanan</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ url('/order') }}">
                @csrf

                <!-- CUSTOMER -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input name="name" class="form-control" placeholder="Nama" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <input name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <input name="phone" class="form-control" placeholder="No HP" required>
                    </div>
                </div>

                <!-- LAYANAN -->
                <h5 class="mt-3">Pilih Layanan</h5>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <select name="products[0][id]" class="form-select">
                            <option value="1">UI/UX Design - Rp 300.000</option>
                            <option value="2">Web Development - Rp 500.000</option>
                            <option value="3">Branding - Rp 400.000</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="number" name="products[0][qty]" class="form-control" value="1" min="1">
                    </div>
                </div>

                <button class="btn btn-main w-100 mt-3">
                    Pesan Sekarang
                </button>

            </form>

        </div>
    </div>

    <!-- DATA ORDER -->
    <div class="card shadow-sm">
        <div class="header-gradient">
            <h4 class="mb-0">Order Kamu</h4>
        </div>

        <div class="card-body">

            @if(count($orders) == 0)
                <p class="text-muted">Belum ada order.</p>
            @endif

            @foreach($orders as $o)
            <div class="order-item p-3 mb-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <strong>Order #{{ $o->id }}</strong><br>
                        <small class="text-muted">{{ $o->order_date }}</small>
                    </div>

                    <div class="text-end">
                        <span class="total-text d-block mb-2">
                            Rp {{ number_format($o->total, 0, ',', '.') }}
                        </span>

                        <a href="{{ url('/order/'.$o->id) }}" class="btn btn-main btn-sm">
                            Detail
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>

@include('layout.footer')