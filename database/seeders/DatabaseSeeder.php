<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. User
        User::create([
            'name' => 'Admin Arcline',
            'email' => 'admin@arcline.com',
            'password' => bcrypt('arcline123'),
        ]);

        // 2. Products (12 products)
        $productsData = [
            [
                'name' => 'Website Company Profile', 
                'price' => 1500000, 
                'description' => 'Layanan pembuatan website profile perusahaan yang modern, responsif, SEO-friendly, dan cepat untuk meningkatkan brand image bisnis Anda.',
                'views' => rand(250, 450),
                'rating' => 4.8
            ],
            [
                'name' => 'UI/UX Design Service', 
                'price' => 800000, 
                'description' => 'Desain antarmuka (UI) dan pengalaman pengguna (UX) yang estetik, modern, serta berorientasi pada kemudahan navigasi pengguna.',
                'views' => rand(150, 320),
                'rating' => 4.9
            ],
            [
                'name' => 'E-Commerce Website', 
                'price' => 3500000, 
                'description' => 'Pembuatan toko online lengkap dengan integrasi payment gateway, sistem inventori, keranjang belanja, dan manajemen pesanan.',
                'views' => rand(300, 500),
                'rating' => 4.7
            ],
            [
                'name' => 'Mobile App Development', 
                'price' => 7500000, 
                'description' => 'Pengembangan aplikasi mobile berbasis iOS & Android dengan performa optimal menggunakan teknologi terbaru (React Native/Flutter).',
                'views' => rand(400, 600),
                'rating' => 4.9
            ],
            [
                'name' => 'Admin Dashboard Integration', 
                'price' => 2000000, 
                'description' => 'Integrasi dashboard admin kustom untuk memantau data bisnis, analitik, dan manajemen operasional secara terpusat.',
                'views' => rand(180, 280),
                'rating' => 4.6
            ],
            [
                'name' => 'SEO Optimization Service', 
                'price' => 1000000, 
                'description' => 'Optimasi mesin pencari (SEO) komprehensif untuk meningkatkan peringkat website Anda di hasil pencarian Google.',
                'views' => rand(200, 350),
                'rating' => 4.5
            ],
            [
                'name' => 'Landing Page Design', 
                'price' => 500000, 
                'description' => 'Desain halaman pendaratan (landing page) berkonversi tinggi untuk mendukung kampanye pemasaran atau peluncuran produk baru.',
                'views' => rand(350, 550),
                'rating' => 4.8
            ],
            [
                'name' => 'Custom Web Application', 
                'price' => 5000000, 
                'description' => 'Pengembangan aplikasi web kustom berskala besar dengan arsitektur yang aman, terukur, dan sesuai kebutuhan bisnis Anda.',
                'views' => rand(280, 420),
                'rating' => 4.9
            ],
            [
                'name' => 'Database Optimization', 
                'price' => 1200000, 
                'description' => 'Analisis dan tuning performa database SQL/NoSQL untuk mempercepat waktu respons sistem dan menghemat resource server.',
                'views' => rand(100, 220),
                'rating' => 4.7
            ],
            [
                'name' => 'Cloud Server Setup', 
                'price' => 1800000, 
                'description' => 'Setup, konfigurasi, dan migrasi server cloud (AWS/GCP/DigitalOcean) dengan sistem keamanan tinggi dan backup otomatis.',
                'views' => rand(120, 250),
                'rating' => 4.8
            ],
            [
                'name' => 'REST API Integration', 
                'price' => 1100000, 
                'description' => 'Pembuatan dan integrasi antarmuka pemrograman aplikasi (API) RESTful yang aman, cepat, dan terdokumentasi dengan baik.',
                'views' => rand(140, 260),
                'rating' => 4.6
            ],
            [
                'name' => 'Maintenance & Bug Fix', 
                'price' => 600000, 
                'description' => 'Layanan pemeliharaan sistem berkala, perbaikan bug/error, dan peningkatan fitur untuk menjaga stabilitas aplikasi Anda.',
                'views' => rand(160, 310),
                'rating' => 4.7
            ],
        ];

        $products = [];
        foreach ($productsData as $p) {
            $products[] = Product::create($p);
        }

        // 3. Customers (15 customers)
        $customerNames = [
            'John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown', 'Charlie Davis',
            'David Miller', 'Eva Wilson', 'Frank Thomas', 'Grace Lee', 'Henry Martin',
            'Ivy Clark', 'Jack Lewis', 'Kate Walker', 'Leo Hall', 'Mia Allen'
        ];

        $customers = [];
        foreach ($customerNames as $index => $name) {
            $customers[] = Customer::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '', $name)) . '@example.com',
                'phone' => '08123456789' . $index,
                'token' => Str::random(10)
            ]);
        }

        // 4. Orders (28 orders)
        for ($i = 1; $i <= 28; $i++) {
            $customer = $customers[array_rand($customers)];
            
            $randVal = rand(1, 100);
            if ($randVal <= 60) {
                $status = 'Completed';
            } elseif ($randVal <= 80) {
                $status = 'Processing';
            } elseif ($randVal <= 95) {
                $status = 'Pending';
            } else {
                $status = 'Cancelled';
            }

            $order = Order::create([
                'customer_id' => $customer->id,
                'order_date' => now()->subDays(28 - $i)->format('Y-m-d'),
                'total' => 0,
                'status' => $status
            ]);

            // Randomly select 1 to 3 products
            $selectedProducts = (array) array_rand($products, rand(1, 3));
            $total = 0;

            foreach ($selectedProducts as $prodIndex) {
                $product = $products[$prodIndex];
                $quantity = rand(1, 2);
                $subtotal = $product->price * $quantity;

                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal
                ]);

                $total += $subtotal;
            }

            $order->update(['total' => $total]);
        }
    }
}
