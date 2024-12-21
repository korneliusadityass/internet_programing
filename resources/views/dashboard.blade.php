@extends('layout.app')

@section('content')
    <div class="card text-center" style="position: relative; height: 80vh;">
        <!-- Logo Utama di Tengah -->
        <div class="card-body d-flex align-items-center justify-content-center" style="margin-bottom: 300px;">
            <img src="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/images/PT_SINGA_JAYA_GROUP.png" alt="logo">
        </div>

        <!-- Gambar Kecil di Tengah Bawah -->
        <div class="position-absolute d-flex justify-content-center align-items-center" style="bottom: 50px; left: 0; right: 0; gap: 20px;">
            <img src="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/images/pexels-lukas-577210.jpg" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
            <img src="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/images/image-56.png" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
            <img src="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/images/istockphoto-1285583141-170667a.jpg" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
        </div>
    </div>
@endsection
