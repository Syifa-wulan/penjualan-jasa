<!-- FOOTER -->
<footer class="footer mt-5">
    <div class="container py-5">
        <div class="row">

            <!-- BRAND -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Arcline Studio</h5>
                <p class="text-muted">
                    Modern digital solutions to elevate your business. 
                    We offer design, development, and branding services.
                </p>
            </div>

            <!-- MENU -->
            <div class="col-md-4 mb-3">
                <h6 class="fw-bold">Menu</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ url('/services') }}" class="footer-link">Services</a></li>
                    <li><a href="{{ url('/portfolio') }}" class="footer-link">Portfolio</a></li>
                    <li><a href="{{ url('/order') }}" class="footer-link">Order</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-4 mb-3">
                <h6 class="fw-bold">Contact</h6>
                <p class="text-muted mb-1">Email: support@arcline.com</p>
                <p class="text-muted">Phone: 0812-3456-7890</p>
            </div>

        </div>

        <hr>

        <div class="text-center text-muted">
            © 2026 Arcline Studio. All rights reserved.
        </div>
    </div>
</footer>

<style>
    .footer {
        background: linear-gradient(180deg, #f5f7fa, #eef1f6);
        border-top: 1px solid #e5e7eb;
    }

    .footer h5, .footer h6 {
        color: #4f46e5;
    }

    .footer-link {
        color: #6c757d;
        text-decoration: none;
        display: block;
        margin-bottom: 6px;
        transition: 0.2s;
    }

    .footer-link:hover {
        color: #4f46e5;
        transform: translateX(3px);
    }
</style>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>