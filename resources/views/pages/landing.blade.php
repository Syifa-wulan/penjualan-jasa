<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ArcLine Studio &mdash; Premium Digital Agency</title>

  <!-- Google Fonts (Nunito — same as Stisla base) -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- Core Bootstrap & Icon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- Stisla Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">

  <style>
    /* ===== BASE RESET for Landing (match Stisla) ===== */
    body {
      font-family: 'Nunito', 'Segoe UI', arial;
      background-color: #fafdfb;
      color: #6c757d;
      font-size: 14px;
      font-weight: 400;
      overflow-x: hidden;
    }
    
    /* ===== OVERRIDE Stisla admin navbar positioning ===== */
    .navbar {
      left: 0 !important;
      right: 0 !important;
      position: fixed !important;
      height: auto !important;
      background-color: transparent;
    }
    .navbar-bg {
      display: none !important;
    }
    
    /* ===== 1. NAVBAR (Full-width, no cutoff) ===== */
    .landing-navbar {
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      transition: all 0.3s ease;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.04);
      padding: 12px 0;
      width: 100% !important;
      z-index: 1030;
    }
    .landing-navbar.scrolled {
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
      padding: 8px 0;
    }
    .brand-logo, .navbar .navbar-brand.brand-logo {
      font-size: 22px;
      font-weight: 800;
      color: #6777ef !important;
      letter-spacing: -0.3px;
      text-decoration: none;
      text-transform: none;
    }
    .brand-logo:hover, .navbar .navbar-brand.brand-logo:hover {
      color: #5563db !important;
      text-decoration: none;
    }
    .brand-logo span {
      color: #34395e !important;
    }
    .landing-navbar .nav-link {
      color: #34395e !important;
      font-weight: 600;
      font-size: 14px;
      padding: 8px 16px !important;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .landing-navbar .nav-link:hover {
      color: #6777ef !important;
      background: rgba(103, 119, 239, 0.06);
    }
    
    /* ===== 2. HERO SECTION ===== */
    .hero-section {
      padding: 130px 0 70px;
      background: 
        radial-gradient(circle at 85% 15%, rgba(103, 119, 239, 0.07) 0%, transparent 45%),
        radial-gradient(circle at 15% 85%, rgba(149, 160, 244, 0.05) 0%, transparent 40%),
        linear-gradient(180deg, #fafdfb 0%, #f8f9fe 100%);
      position: relative;
      overflow: hidden;
    }
    .hero-title {
      font-size: 42px;
      font-weight: 800;
      line-height: 1.25;
      color: #34395e;
      letter-spacing: -0.5px;
    }
    .hero-title .text-gradient {
      background: linear-gradient(135deg, #6777ef 0%, #95a0f4 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero-subtitle {
      font-size: 16px;
      color: #6c757d;
      line-height: 1.7;
      font-weight: 400;
    }
    .hero-illustration {
      max-height: 380px;
      width: auto;
    }
    
    /* ===== 3. BUTTONS (Stisla-matched) ===== */
    .btn-gradient {
      background: linear-gradient(135deg, #6777ef 0%, #5a67d8 100%);
      color: #fff !important;
      font-weight: 700;
      border: none;
      border-radius: 30px;
      padding: 12px 28px;
      font-size: 14px;
      box-shadow: 0 2px 6px #acb5f6;
      transition: all 0.3s ease;
    }
    .btn-gradient:hover {
      background: linear-gradient(135deg, #5a67d8 0%, #6777ef 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(103, 119, 239, 0.35);
      color: #fff !important;
    }
    .btn-outline-custom {
      border: 2px solid #e4e6fc;
      color: #34395e !important;
      font-weight: 700;
      border-radius: 30px;
      padding: 10px 26px;
      font-size: 14px;
      transition: all 0.3s ease;
      background: transparent;
    }
    .btn-outline-custom:hover {
      border-color: #6777ef;
      color: #6777ef !important;
      background: rgba(103, 119, 239, 0.04);
      transform: translateY(-2px);
      text-decoration: none;
    }
    
    /* ===== 4. STATS SECTION ===== */
    .stats-section {
      background: #f8f9fe;
      border-top: 1px solid #f0f0f8;
      border-bottom: 1px solid #f0f0f8;
    }
    .stats-card-landing {
      border: none;
      border-radius: 10px;
      background: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
      transition: all 0.3s ease;
    }
    .stats-card-landing:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(103, 119, 239, 0.1);
    }
    .stats-icon-landing {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
    }
    
    /* ===== 5. SECTION TITLES ===== */
    .section-label {
      color: #6777ef;
      font-weight: 700;
      text-transform: uppercase;
      font-size: 12px;
      letter-spacing: 1.5px;
    }
    .section-title-landing {
      font-size: 28px;
      font-weight: 700;
      color: #34395e;
      letter-spacing: -0.3px;
    }
    .section-subtitle-landing {
      color: #6c757d;
      max-width: 560px;
      margin: auto;
      font-size: 15px;
    }
    
    /* ===== 6. SERVICE CARDS ===== */
    .service-card-landing {
      border: none;
      border-radius: 10px;
      background: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      overflow: hidden;
    }
    .service-card-landing:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 35px rgba(103, 119, 239, 0.12);
    }
    .service-icon-wrapper {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }
    
    /* ===== 7. FEATURES SECTION ===== */
    .features-section {
      background: #f8f9fe;
    }
    .feature-icon-circle {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: rgba(103, 119, 239, 0.08);
      color: #6777ef;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      margin-bottom: 18px;
    }
    
    /* ===== 8. CTA BANNER ===== */
    .cta-banner-landing {
      background: linear-gradient(135deg, #6777ef 0%, #4b52c9 100%);
      border-radius: 15px;
      padding: 50px 30px;
      box-shadow: 0 15px 40px rgba(103, 119, 239, 0.25);
    }
    
    /* ===== 9. FOOTER ===== */
    .landing-footer {
      background: #191d21;
    }
    .landing-footer a {
      transition: all 0.3s ease;
    }
    .landing-footer a:hover {
      color: #6777ef !important;
      opacity: 1 !important;
      text-decoration: none;
    }
    
    /* ===== 10. SMOOTH SCROLL ===== */
    html {
      scroll-behavior: smooth;
    }
    
    /* ===== 11. RESPONSIVE ===== */
    @media (max-width: 991.98px) {
      .hero-section {
        padding: 110px 0 50px;
        text-align: center;
      }
      .hero-title {
        font-size: 30px;
      }
      .hero-subtitle {
        font-size: 14px;
      }
      .hero-illustration {
        max-height: 260px;
        margin-top: 30px;
      }
      .landing-navbar .navbar-collapse {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        margin-top: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      }
    }
    @media (max-width: 575.98px) {
      .hero-title {
        font-size: 26px;
      }
      .cta-banner-landing {
        padding: 35px 20px;
      }
      .section-title-landing {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>

  <!-- ====== NAVBAR (Full-width, fixed-top) ====== -->
  <nav class="navbar navbar-expand-lg landing-navbar fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand brand-logo" href="#">Arc<span>Line</span> Studio</a>
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" style="color: #6777ef; font-size: 20px;"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#why-us">Keunggulan</a>
          </li>
          <li class="nav-item ml-lg-3 mt-2 mt-lg-0">
            <a class="btn btn-outline-custom btn-sm mr-2" href="{{ route('login') }}"><i class="fas fa-user-shield mr-1"></i> Admin</a>
            <a class="btn btn-gradient btn-sm" href="{{ route('pages.order') }}"><i class="fas fa-paper-plane mr-1"></i> Order Now</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ====== HERO SECTION ====== -->
  <section class="hero-section" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <span class="badge badge-light font-weight-bold mb-3 px-3 py-2" style="color: #6777ef; font-size: 12px; border: 1px solid #e4e6fc;">
            <i class="fas fa-code mr-1"></i> Software & UI/UX Agency
          </span>
          <h1 class="hero-title mb-4">Wujudkan Ide Digital Anda Bersama <span class="text-gradient">ArcLine</span></h1>
          <p class="hero-subtitle mb-4">Kami menghadirkan solusi pengembangan website profil, e-commerce, aplikasi mobile, dashboard kustom, serta desain antarmuka premium berkualitas nasional untuk akselerasi pertumbuhan bisnis Anda.</p>
          <div>
            <a class="btn btn-gradient btn-lg mr-2" href="{{ route('pages.order') }}"><i class="fas fa-shopping-bag mr-2"></i> Mulai Order</a>
            <a class="btn btn-outline-custom btn-lg" href="#services">Lihat Layanan</a>
          </div>
        </div>
        <div class="col-lg-6 text-center">
          <!-- Inline SVG Illustration (no external file dependency) -->
          <svg class="hero-illustration" viewBox="0 0 600 450" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Background shapes -->
            <ellipse cx="300" cy="400" rx="250" ry="30" fill="#f0f0f8" opacity="0.6"/>
            
            <!-- Main Monitor -->
            <rect x="140" y="60" width="320" height="210" rx="12" fill="#34395e"/>
            <rect x="155" y="75" width="290" height="180" rx="6" fill="#f8f9fe"/>
            
            <!-- Screen content - code lines -->
            <rect x="175" y="95" width="80" height="8" rx="4" fill="#6777ef" opacity="0.7"/>
            <rect x="265" y="95" width="60" height="8" rx="4" fill="#95a0f4" opacity="0.5"/>
            <rect x="175" y="115" width="50" height="8" rx="4" fill="#e4e6fc"/>
            <rect x="235" y="115" width="110" height="8" rx="4" fill="#6777ef" opacity="0.4"/>
            <rect x="175" y="135" width="140" height="8" rx="4" fill="#acb5f6" opacity="0.5"/>
            <rect x="175" y="155" width="70" height="8" rx="4" fill="#6777ef" opacity="0.6"/>
            <rect x="255" y="155" width="90" height="8" rx="4" fill="#e4e6fc"/>
            <rect x="175" y="175" width="100" height="8" rx="4" fill="#95a0f4" opacity="0.4"/>
            <rect x="285" y="175" width="50" height="8" rx="4" fill="#6777ef" opacity="0.3"/>
            <rect x="175" y="195" width="130" height="8" rx="4" fill="#e4e6fc"/>
            <rect x="175" y="215" width="60" height="8" rx="4" fill="#6777ef" opacity="0.5"/>
            <rect x="245" y="215" width="80" height="8" rx="4" fill="#acb5f6" opacity="0.4"/>
            
            <!-- Monitor stand -->
            <rect x="270" y="270" width="60" height="30" rx="2" fill="#34395e"/>
            <rect x="240" y="295" width="120" height="10" rx="5" fill="#34395e"/>
            
            <!-- Floating UI card (left) -->
            <g transform="translate(50, 120)">
              <rect width="90" height="100" rx="8" fill="#fff" stroke="#e4e6fc" stroke-width="1.5"/>
              <rect x="12" y="14" width="66" height="40" rx="4" fill="#6777ef" opacity="0.12"/>
              <circle cx="45" cy="34" r="12" fill="#6777ef" opacity="0.3"/>
              <path d="M41 34 L44 37 L50 30" stroke="#6777ef" stroke-width="2" fill="none" stroke-linecap="round"/>
              <rect x="12" y="64" width="40" height="6" rx="3" fill="#34395e" opacity="0.3"/>
              <rect x="12" y="78" width="60" height="5" rx="2.5" fill="#e4e6fc"/>
            </g>
            
            <!-- Floating chart card (right) -->
            <g transform="translate(470, 90)">
              <rect width="100" height="80" rx="8" fill="#fff" stroke="#e4e6fc" stroke-width="1.5"/>
              <rect x="14" y="12" width="72" height="6" rx="3" fill="#34395e" opacity="0.3"/>
              <!-- Mini bar chart -->
              <rect x="18" y="55" width="10" height="16" rx="2" fill="#6777ef" opacity="0.3"/>
              <rect x="33" y="45" width="10" height="26" rx="2" fill="#6777ef" opacity="0.5"/>
              <rect x="48" y="35" width="10" height="36" rx="2" fill="#6777ef" opacity="0.7"/>
              <rect x="63" y="28" width="10" height="43" rx="2" fill="#6777ef"/>
            </g>
            
            <!-- Floating notification (top right) -->
            <g transform="translate(430, 50)">
              <rect width="110" height="40" rx="8" fill="#fff" stroke="#e4e6fc" stroke-width="1.5"/>
              <circle cx="22" cy="20" r="10" fill="#63ed7a" opacity="0.2"/>
              <path d="M18 20 L21 23 L27 16" stroke="#63ed7a" stroke-width="2" fill="none" stroke-linecap="round"/>
              <rect x="40" y="12" width="55" height="5" rx="2.5" fill="#34395e" opacity="0.3"/>
              <rect x="40" y="22" width="40" height="4" rx="2" fill="#e4e6fc"/>
            </g>
            
            <!-- Decorative dots -->
            <circle cx="95" cy="80" r="4" fill="#6777ef" opacity="0.15"/>
            <circle cx="80" cy="95" r="3" fill="#95a0f4" opacity="0.2"/>
            <circle cx="520" cy="260" r="5" fill="#6777ef" opacity="0.1"/>
            <circle cx="540" cy="240" r="3" fill="#acb5f6" opacity="0.2"/>
            
            <!-- Decorative rings -->
            <circle cx="530" cy="350" r="20" stroke="#6777ef" stroke-width="1.5" fill="none" opacity="0.1"/>
            <circle cx="530" cy="350" r="12" stroke="#6777ef" stroke-width="1" fill="none" opacity="0.08"/>
            <circle cx="70" cy="300" r="15" stroke="#95a0f4" stroke-width="1.5" fill="none" opacity="0.12"/>
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== METRICS / STATS SECTION ====== -->
  <section class="py-5 stats-section">
    <div class="container">
      <div class="row">
        <!-- Metric 1: Total Completed Projects -->
        <div class="col-6 col-lg-3 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4 text-center">
              <div class="stats-icon-landing mx-auto mb-3" style="background: rgba(103,119,239,0.08); color: #6777ef;"><i class="fas fa-check-circle"></i></div>
              <h3 class="font-weight-bold mb-1" style="color: #34395e;">{{ sprintf("%02d", $totalOrder) }}</h3>
              <p class="mb-0 font-weight-bold" style="color: #98a6ad; font-size: 12px;">Project Sukses</p>
            </div>
          </div>
        </div>
        <!-- Metric 2: Active Clients -->
        <div class="col-6 col-lg-3 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4 text-center">
              <div class="stats-icon-landing mx-auto mb-3" style="background: rgba(99,237,122,0.08); color: #63ed7a;"><i class="fas fa-users"></i></div>
              <h3 class="font-weight-bold mb-1" style="color: #34395e;">{{ sprintf("%02d", $totalCustomer) }}</h3>
              <p class="mb-0 font-weight-bold" style="color: #98a6ad; font-size: 12px;">Client Aktif</p>
            </div>
          </div>
        </div>
        <!-- Metric 3: Active Jasa Services -->
        <div class="col-6 col-lg-3 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4 text-center">
              <div class="stats-icon-landing mx-auto mb-3" style="background: rgba(255,164,38,0.08); color: #ffa426;"><i class="fas fa-cubes"></i></div>
              <h3 class="font-weight-bold mb-1" style="color: #34395e;">{{ sprintf("%02d", $totalProduct) }}</h3>
              <p class="mb-0 font-weight-bold" style="color: #98a6ad; font-size: 12px;">Layanan Aplikasi</p>
            </div>
          </div>
        </div>
        <!-- Metric 4: Average Client Rating -->
        <div class="col-6 col-lg-3 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4 text-center">
              <div class="stats-icon-landing mx-auto mb-3" style="background: rgba(255,164,38,0.08); color: #ffa426;"><i class="fas fa-star"></i></div>
              <h3 class="font-weight-bold mb-1" style="color: #34395e;">{{ $averageRating }}/5.0</h3>
              <p class="mb-0 font-weight-bold" style="color: #98a6ad; font-size: 12px;">Rating Kepuasan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== SERVICES / PRODUCTS SECTION ====== -->
  <section class="py-5" id="services">
    <div class="container py-3">
      <div class="text-center mb-5">
        <span class="section-label d-block mb-2">Katalog Layanan</span>
        <h2 class="section-title-landing mb-3">Layanan Jasa Aplikasi Terbaik Kami</h2>
        <p class="section-subtitle-landing">Kami menawarkan pembuatan produk sistem aplikasi software premium dengan teknologi mutakhir dan tim pengembang berdedikasi tinggi.</p>
      </div>

      <div class="row">
        @forelse($products as $product)
          @php
              $iconClass = 'fa-globe';
              $iconBg = 'rgba(103,119,239,0.08)';
              $iconColor = '#6777ef';
              
              if (str_contains(strtolower($product->name), 'mobile') || str_contains(strtolower($product->name), 'app')) {
                  $iconClass = 'fa-mobile-alt';
                  $iconBg = 'rgba(99,237,122,0.08)';
                  $iconColor = '#63ed7a';
              } elseif (str_contains(strtolower($product->name), 'dashboard') || str_contains(strtolower($product->name), 'admin')) {
                  $iconClass = 'fa-tachometer-alt';
                  $iconBg = 'rgba(255,164,38,0.08)';
                  $iconColor = '#ffa426';
              } elseif (str_contains(strtolower($product->name), 'seo') || str_contains(strtolower($product->name), 'marketing')) {
                  $iconClass = 'fa-chart-line';
                  $iconBg = 'rgba(58,186,244,0.08)';
                  $iconColor = '#3abaf4';
              } elseif (str_contains(strtolower($product->name), 'e-commerce') || str_contains(strtolower($product->name), 'toko')) {
                  $iconClass = 'fa-shopping-cart';
                  $iconBg = 'rgba(252,84,75,0.08)';
                  $iconColor = '#fc544b';
              }
          @endphp
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card service-card-landing h-100 mb-0">
              <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                  <div class="d-flex align-items-center mb-3">
                    <div class="service-icon-wrapper" style="background: {{ $iconBg }}; color: {{ $iconColor }};">
                      <i class="fas {{ $iconClass }}"></i>
                    </div>
                    <div class="ml-3">
                      <span class="badge badge-light font-weight-bold" style="font-size: 10px; color: #98a6ad; letter-spacing: 0.5px;">PREMIUM APP</span>
                    </div>
                  </div>
                  <h6 class="font-weight-bold mb-2" style="color: #34395e;">{{ $product->name }}</h6>
                  <p class="mb-3" style="font-size: 13px; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; min-height: 52px; color: #6c757d;">
                    {{ $product->description }}
                  </p>
                </div>
                <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                  <div class="font-weight-bold" style="color: #6777ef; font-size: 14px;">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                  <div class="d-flex align-items-center">
                    <small class="mr-2" style="color: #98a6ad;"><i class="fas fa-star mr-1" style="color: #ffa426;"></i>{{ number_format($product->rating, 1) }}</small>
                    <a class="btn btn-primary btn-sm rounded-pill px-3 py-1" href="{{ route('pages.order') }}?token=new" style="font-size: 11px;"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center py-5" style="color: #98a6ad;">
            <i class="fas fa-folder-open fa-3x mb-3" style="color: #e4e6fc;"></i>
            <p>Tidak ada layanan aktif saat ini.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ====== KEY FEATURES / WHY CHOOSE US ====== -->
  <section class="py-5 features-section" id="why-us">
    <div class="container py-3">
      <div class="text-center mb-5">
        <span class="section-label d-block mb-2">Keunggulan Kami</span>
        <h2 class="section-title-landing mb-3">Kenapa Memilih Layanan ArcLine?</h2>
        <p class="section-subtitle-landing">Kami bertekad memberikan standar kualitas pengembangan digital terbaik dengan proses yang transparan dan hasil maksimal.</p>
      </div>

      <div class="row">
        <!-- Feature 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4">
              <div class="feature-icon-circle"><i class="fas fa-layer-group"></i></div>
              <h6 class="font-weight-bold mb-3" style="color: #34395e;">UI/UX Modern & Elegant</h6>
              <p class="mb-0" style="font-size: 13px; line-height: 1.7; color: #6c757d;">Setiap antarmuka didesain secara kustom dengan pendekatan modern, responsif, berkelas, serta fokus pada kenyamanan akses pengguna.</p>
            </div>
          </div>
        </div>
        <!-- Feature 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4">
              <div class="feature-icon-circle"><i class="fas fa-shield-alt"></i></div>
              <h6 class="font-weight-bold mb-3" style="color: #34395e;">Sistem Aman & Cepat</h6>
              <p class="mb-0" style="font-size: 13px; line-height: 1.7; color: #6c757d;">Menggunakan framework terdepan dengan arsitektur server teruji untuk memastikan keamanan data serta kecepatan respons sistem yang optimal.</p>
            </div>
          </div>
        </div>
        <!-- Feature 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card stats-card-landing h-100 mb-0">
            <div class="card-body p-4">
              <div class="feature-icon-circle"><i class="fas fa-headset"></i></div>
              <h6 class="font-weight-bold mb-3" style="color: #34395e;">Dukungan Tim Ahli</h6>
              <p class="mb-0" style="font-size: 13px; line-height: 1.7; color: #6c757d;">Dukungan konsultasi berkelanjutan dan pengerjaan berdedikasi oleh pengembang berpengalaman demi hasil akhir yang memuaskan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== CTA BANNER SECTION ====== -->
  <section class="py-5">
    <div class="container">
      <div class="cta-banner-landing text-center text-white">
        <h2 class="font-weight-bold mb-3" style="font-size: 26px; letter-spacing: -0.3px;">Siap Mengembangkan Platform Digital Anda?</h2>
        <p class="mb-4 mx-auto" style="max-width: 560px; opacity: 0.9; font-size: 14px;">Hubungi kami sekarang untuk konsultasi gratis atau lakukan pemesanan jasa pembuatan website dan aplikasi mobile secara instan melalui portal order.</p>
        <a class="btn btn-light btn-lg font-weight-bold rounded-pill px-5 shadow" href="{{ route('pages.order') }}" style="color: #6777ef;">
          <i class="fas fa-rocket mr-2"></i> Mulai Proyek Anda
        </a>
      </div>
    </div>
  </section>

  <!-- ====== FOOTER ====== -->
  <footer class="py-5 landing-footer text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5 class="font-weight-bold mb-3" style="color: #6777ef;">ArcLine Studio</h5>
          <p style="opacity: 0.6; line-height: 1.7; font-size: 13px;">Agensi pengembangan produk digital premium berkualitas nasional untuk meningkatkan pertumbuhan bisnis digital Anda.</p>
          <div class="mt-3">
            <a href="#" class="text-white mr-3" style="opacity: 0.5;"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white mr-3" style="opacity: 0.5;"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white mr-3" style="opacity: 0.5;"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-white" style="opacity: 0.5;"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
          <h6 class="font-weight-bold mb-3">Lokasi Kantor</h6>
          <p class="mb-1" style="opacity: 0.6; font-size: 13px;"><i class="fas fa-map-marker-alt mr-2" style="color: #6777ef;"></i> Malang, Jawa Timur, Indonesia</p>
          <p class="mb-1" style="opacity: 0.6; font-size: 13px;"><i class="fas fa-envelope mr-2" style="color: #6777ef;"></i> contact@arcline.com</p>
          <p class="mb-0" style="opacity: 0.6; font-size: 13px;"><i class="fas fa-phone mr-2" style="color: #6777ef;"></i> +62 812-3456-7890</p>
        </div>
        <div class="col-md-6 col-lg-4">
          <h6 class="font-weight-bold mb-3">Akses Navigasi</h6>
          <ul class="list-unstyled mb-0" style="font-size: 13px;">
            <li class="mb-2"><a href="#home" class="text-white" style="opacity: 0.6;">Beranda Utama</a></li>
            <li class="mb-2"><a href="#services" class="text-white" style="opacity: 0.6;">Katalog Jasa</a></li>
            <li class="mb-2"><a href="{{ route('pages.order') }}" class="text-white" style="opacity: 0.6;">Formulir Order</a></li>
            <li><a href="{{ route('login') }}" class="text-white" style="opacity: 0.6;">Masuk Admin Portal</a></li>
          </ul>
        </div>
      </div>
      <hr style="border-color: rgba(255,255,255,0.08); margin: 25px 0 18px;">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-left" style="opacity: 0.5; font-size: 12px;">
          &copy; {{ date('Y') }} ArcLine Studio. All rights reserved.
        </div>
        <div class="col-md-6 text-center text-md-right mt-2 mt-md-0" style="opacity: 0.5; font-size: 12px;">
          Crafted with <i class="fas fa-heart" style="color: #fc544b;"></i> in Indonesia.
        </div>
      </div>
    </div>
  </footer>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Navbar scroll effect -->
  <script>
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 50) {
        $('#mainNav').addClass('scrolled');
      } else {
        $('#mainNav').removeClass('scrolled');
      }
    });
  </script>
</body>
</html>
