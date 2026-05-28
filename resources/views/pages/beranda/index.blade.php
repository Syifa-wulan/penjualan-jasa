@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">

            <div class="row">

                <!-- Total Products -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-box"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Products</h4>
                            </div>

                            <div class="card-body">
                                12
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Orders</h4>
                            </div>

                            <div class="card-body">
                                28
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Customers</h4>
                            </div>

                            <div class="card-body">
                                15
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <!-- Welcome Card -->
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Welcome to Arcline Studio</h4>
                        </div>

                        <div class="card-body">
                            <p>
                                Arcline Studio adalah platform penjualan jasa software
                                yang menyediakan layanan pembuatan website, aplikasi,
                                dashboard admin, dan sistem digital modern.
                            </p>

                            <p>
                                Gunakan dashboard ini untuk mengelola products,
                                customer, dan orders secara mudah.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Activity -->
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activity</h4>
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <strong>New Order</strong>
                                <br>
                                Website Company Profile
                            </div>

                            <div class="mb-3">
                                <strong>New Customer</strong>
                                <br>
                                John Doe
                            </div>

                            <div>
                                <strong>Product Updated</strong>
                                <br>
                                UI/UX Design Service
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection