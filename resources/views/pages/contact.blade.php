@include('layout.navbar')

<div class="container mt-5">
<h2 class="mb-4">Contact Us</h2>

<div class="card p-4 shadow-sm">

<form>
<div class="mb-3">
<input class="form-control" placeholder="Nama">
</div>

<div class="mb-3">
<input class="form-control" placeholder="Email">
</div>

<div class="mb-3">
<textarea class="form-control" placeholder="Pesan"></textarea>
</div>

<button class="btn btn-primary">Kirim</button>

</form>

</div>
</div>

@include('layout.footer')