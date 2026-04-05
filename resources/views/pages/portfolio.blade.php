@include('layout.navbar')

<style>
    body {
        background-color: #f5f7fa;
    }

    /* Memastikan semua card memiliki tinggi yang sama dalam satu baris */
    .portfolio-grid {
        display: flex;
        flex-wrap: wrap;
    }

    .portfolio-card {
        border-radius: 12px;
        overflow: hidden;
        background: white;
        transition: 0.3s;
        height: 100%; /* Membuat card mengisi tinggi kolom */
        display: flex;
        flex-direction: column;
        border: none;
    }

    .portfolio-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
    }

    /* Kunci agar gambar full dan tidak gepeng */
    .portfolio-img-wrapper {
        width: 100%;
        height: 220px; /* Tinggi seragam untuk semua gambar */
        overflow: hidden;
    }

    .portfolio-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Gambar akan memotong bagian tepi agar memenuhi area */
        display: block;
    }

    .service-title {
        color: #4f46e5;
        font-weight: bold;
    }

    .btn-main {
        background: linear-gradient(90deg, #6366f1, #4f46e5);
        color: white;
        border: none;
        transition: 0.3s;
    }

    .btn-main:hover {
        opacity: 0.9;
        color: white;
        transform: scale(1.02);
    }

    /* Merapikan teks agar tombol selalu di bawah */
    .card-content {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card-text-description {
        flex-grow: 1; /* Mendorong tombol ke bawah jika teks pendek */
    }
</style>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">My Portfolio</h2>
    </div>

    <div class="row portfolio-grid">

        <div class="col-md-4 mb-4">
            <div class="portfolio-card shadow-sm">
                <div class="portfolio-img-wrapper">
                    <img src="https://img.freepik.com/free-vector/gradient-ui-ux-landing-page_52683-69729.jpg?semt=ais_hybrid&w=740&q=80"
                         class="portfolio-img" alt="UI/UX Design">
                </div>
                <div class="card-content">
                    <h5 class="service-title">UI/UX Design</h5>
                    <p class="text-muted small card-text-description">
                        Modern landing page design with clean layout and user-friendly interface. Focused on conversion and accessibility.
                    </p>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark border mb-2">Figma</span>
                        <span class="badge bg-light text-dark border mb-2">Adobe XD</span>
                        <button class="btn btn-main btn-sm w-100">View Detail</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="portfolio-card shadow-sm">
                <div class="portfolio-img-wrapper">
                    <img src="https://cdn.dribbble.com/userupload/16893941/file/original-946fc217c55faf31c7fee1731bd6b5e6.jpg?resize=400x0"
                         class="portfolio-img" alt="Web Development">
                </div>
                <div class="card-content">
                    <h5 class="service-title">Web Development</h5>
                    <p class="text-muted small card-text-description">
                        Fullstack website development using Laravel. Features include secure authentication, database integration, and responsive UI.
                    </p>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark border mb-2">Laravel</span>
                        <span class="badge bg-light text-dark border mb-2">Bootstrap</span>
                        <button class="btn btn-main btn-sm w-100">View Detail</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="portfolio-card shadow-sm">
                <div class="portfolio-img-wrapper">
                    <img src="https://i.pinimg.com/736x/fa/8a/85/fa8a8599cb07e3b5d7fb01899a52d548.jpg"
                         class="portfolio-img" alt="Branding">
                </div>
                <div class="card-content">
                    <h5 class="service-title">Branding</h5>
                    <p class="text-muted small card-text-description">
                        Creative branding design including logo, color palette, and full visual identity system for startups.
                    </p>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark border mb-2">Illustrator</span>
                        <span class="badge bg-light text-dark border mb-2">Photoshop</span>
                        <button class="btn btn-main btn-sm w-100">View Detail</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('layout.footer')