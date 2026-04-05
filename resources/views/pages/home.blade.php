<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Arcline Studio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f5f7fa;
}

/* HERO */
.hero {
    padding: 80px 0;
}

.hero h1 {
    font-size: 48px;
    font-weight: bold;
}

.hero p {
    color: #6c757d;
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
}
</style>
</head>

<body>

@include('layout.navbar')

<div class="container">

    <!-- HERO -->
    <div class="row hero align-items-center">
        <div class="col-md-6">
            <h1>Creative Digital Solutions for Modern Brands</h1>
            <p>
                We provide UI/UX design, web development, and digital solutions 
                to help your business grow faster.
            </p>

            <a href="/services" class="btn btn-main mt-3">Explore Services</a>
        </div>

        <div class="col-md-6">
            <img src="https://i.pinimg.com/736x/6e/f1/55/6ef155e25a6a517d8c89a46ebba37d71.jpg" alt="Hero Image"
                 class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- SERVICES PREVIEW -->
    <div class="mt-5">
        <h3 class="mb-4">Our Services</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>UI/UX Design</h5>
                    <p class="text-muted">Modern and user-friendly interface design</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Web Development</h5>
                    <p class="text-muted">Responsive and scalable websites</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Branding</h5>
                    <p class="text-muted">Strong and memorable brand identity</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="card p-4 mt-5 text-center shadow-sm">
        <h4>Ready to start your project?</h4>
        <p class="text-muted">Order our services now and grow your business</p>
        <a href="/order" class="btn btn-main">Order Now</a>
    </div>

</div>

@include('layout.footer')

</body>
</html>