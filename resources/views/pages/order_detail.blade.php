<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }

        /* HEADER GRADIENT */
        .header-gradient {
            background: linear-gradient(90deg, #6366f1, #4f46e5);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 20px;
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

        /* TABLE */
        .table thead {
            background-color: #4f46e5;
            color: white;
        }

        .total-text {
            color: #4f46e5;
            font-weight: bold;
        }

        @media print {
            .no-print { display: none; }
            .card { box-shadow: none !important; }
        }
    </style>
</head>

<body>

@include('layout.navbar')

<div class="container mt-5 mb-5">
    <div class="card shadow">

        <!-- HEADER -->
        <div class="header-gradient d-flex justify-content-between align-items-center">
            <h4 class="mb-0">INVOICE #{{ $order->id }}</h4>
            <span>{{ $order->created_at->format('d M Y') }}</span>
        </div>

        <div class="card-body p-4">

            <!-- CUSTOMER -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3 text-muted">Informasi Pelanggan</h6>
                    <h5 class="mb-1">{{ $order->customer->name }}</h5>
                    <p class="text-muted mb-0">{{ $order->customer->email }}</p>
                    <p class="text-muted">{{ $order->customer->phone }}</p>
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Layanan</th>
                            <th class="text-end">Harga</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->details as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td class="text-end">
                                Rp {{ number_format($item->subtotal / $item->quantity, 0, ',', '.') }}
                            </td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-end">
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end">
                                <strong>Total Bayar</strong>
                            </td>
                            <td class="text-end total-text">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-end gap-2 mt-4 no-print">
                <a href="{{ url('/order') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button onclick="window.print()" class="btn btn-main">
                    Cetak Invoice
                </button>
            </div>

        </div>
    </div>
</div>

@include('layout.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>