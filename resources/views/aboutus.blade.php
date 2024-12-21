@extends('layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .logo-utama {
            margin-top: 40px;
            text-align: center;
        }

        .about-us {
            margin-top: 10px; /* Jarak kecil antara logo dan teks */
            margin-bottom: 20px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
        }

        ul {
            padding: 0;
            margin: 0;
            list-style-type: none; /* Pastikan ini ada di sini */
        }

        li {
            font-size: 18px;
            line-height: 1.6;
            list-style-type: none; /* Menambahkan ini jika belum hilang */
        }

        .gambar-bawah {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .gambar-bawah img {
            width: 500px;
            height: auto;
        }
    </style>
    <div class="card">
        <div class="container">
            <!-- Logo Utama -->
            <div class="logo-utama" style="margin: 20px">
            <img src="https://idoxbku.sufydely.com/assets/images/PT_SINGA_JAYA_GROUP.png" alt="logo" style="max-width: 600px;">
            </div>

            <!-- About Us -->
            <div class="about-us">
                <h1 style="margin: 40px 0px 40px 0px;">About Us</h1>
                <strong>Laurensius Patrix Ambarura</strong> - 18.K1.0066 <br>
                <strong>Vincencius Ferrer Iglasias</strong> - 18.K1.0068 <br>
                <strong>Yanto Yordan Kotouki</strong> - 23.K1.0055 <br>
            </div>

            <!-- Gambar Bawah -->
            <div class="gambar-bawah" style="margin: 40px 0px 50px 0px;">
                <img src="https://idoxbku.sufydely.com/assets/images/istockphoto-1285583141-170667a.jpg" alt="gambar3">
            </div>
        </div>
    </div>
@endsection
