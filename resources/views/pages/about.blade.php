<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About - Arcline Studio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f5f7fa;
}

.card {
    border-radius: 12px;
}

h2 {
    font-weight: bold;
}

.section-title {
    font-weight: 600;
}
</style>
</head>

<body>

@include('layout.navbar')

<div class="container mt-5">

    <div class="card p-4 shadow-sm">
        
        <!-- TITLE -->
        <h2 class="mb-3">About Arcline Studio</h2>

        <!-- DESC -->
        <p class="text-muted">
            Arcline Studio is a digital creative agency focusing on design, web development, 
            and brand strategy. We combine aesthetics with usability to build memorable digital experiences.
        </p>

        <!-- GRID -->
        <div class="row mt-4">

            <!-- VISION -->
            <div class="col-md-4">
                <h5 class="section-title">Vision</h5>
                <p class="text-muted">
                    Inspire businesses to grow through creative design and technology.
                </p>
            </div>

            <!-- MISSION -->
            <div class="col-md-4">
                <h5 class="section-title">Mission</h5>
                <ul class="text-muted">
                    <li>Deliver modern and usable design</li>
                    <li>Build performant websites</li>
                    <li>Support consistent brand identity</li>
                </ul>
            </div>

            <!-- VALUES -->
            <div class="col-md-4">
                <h5 class="section-title">Values</h5>
                <p class="text-muted">
                    Creativity • Clarity • Collaboration
                </p>
            </div>

        </div>

    </div>

</div>

@include('layout.footer')

</body>
</html>