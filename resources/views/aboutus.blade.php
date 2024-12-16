<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            font-size: 18px;
            line-height: 1.6;
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
</head>
<body>
    <div class="container">
        <!-- Logo Utama -->
        <div class="logo-utama">
            <img src="{{ asset('assets/images/PT_SINGA_JAYA_GROUP.png') }}" alt="logo" style="max-width: 300px;">
        </div>

        <!-- About Us -->
        <div class="about-us">
            <h1>About Us</h1>
            <ul>
                <li><strong>Laurensius Patrix Ambarura</strong> - 18.K1.0066</li>
                <li><strong>Vincencius Ferrer Iglasias</strong> - 18.K1.0068</li>
                <li><strong>Yanto Yordan Kotouki</strong> - 23.K1.0055</li>
            </ul>
        </div>

        <!-- Gambar Bawah -->
        <div class="gambar-bawah">
            <img src="{{ asset('assets/images/istockphoto-1285583141-170667a.jpg') }}" alt="gambar3">
        </div>
    </div>
    <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2024. All rights reserved.</span>
      </span>
    </div>
  </footer>
</body>
</html>
