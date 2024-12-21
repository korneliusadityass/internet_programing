
<!DOCTYPE html>
<html>
<head>
  <title>SJG || {{  $title }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="uNVSm5nA5TkDq47DOb8dni7iHdaNQi8gYkR18cq7">
  <link rel="shortcut icon" href="https://idoxbku.sufydely.com/assets/favicon.ico">

  <!-- plugin css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">
  <!-- end plugin css -->

    <!-- <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/plugin.css"> -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">
  <!-- end common css -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

  <style>
    .slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.user-bg{
    background-color: #fff;
    padding: 20px;
}


.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  border: none;
  background-color: transparent;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
  </style>
  </head>
<body data-base-url="">
  <div class="container-scroller" id="app">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="dashboard">
    <img src="https://idoxbku.sufydely.com/assets/images/PT_SINGA_JAYA_GROUP.png" style="height: 40px!important; width: 100%!important;" alt="logo"></a>
    <a class="navbar-brand brand-logo-mini" href="dashboard">
      <img src="https://idoxbku.sufydely.com/assets/images/logo.jpg" style="height: 40px!important; width: 100%!important;" alt="logo"> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <i class="fa-solid fa-bars"></i>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">
                {{ Auth::user()->nama ?? ''}} !
        </span>
          <img class="img-xs rounded-circle" src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/images/faces/face8.jpg" alt="Profile image">
          <i class="fa-solid fa-caret-down" style="font-size: 15px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a href="{{ route('actionlogout') }}" class="dropdown-item"> Sign Out </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <i class="fa-solid fa-caret-down"></i>
    </button>
  </div>
</nav>
<div class="container-fluid page-body-wrapper">
       <div class="right-sidebar-toggler-wrapper">
</div>
<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile not-navigation-link">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/images/faces/face8.jpg" alt="profile image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name">{{ Auth::user()->nama ?? '' }}</p>
              <div class="dropdown" data-display="static">
                <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <small class="designation text-muted">{{ Auth::user()->role->nama ?? ''}}</small>
                  <span class="status-indicator online"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="menu-icon fa-solid fa-house"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('pegawai') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pegawai') }}">
          <i class="menu-icon fa-solid fa-book"></i>
          <span class="menu-title">Pegawai</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('aboutus') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('aboutus') }}">
          <i class="menu-icon fa-solid fa-globe"></i>
          <span class="menu-title">About</span>
        </a>
      </li>
    </ul>
  </nav>

<div class="main-panel">
  <div class="content-wrapper">
    <!-- Row for Product Analysis Chart -->
    <div class="row justify-content-center">
      <div class="col-md-12 grid-margin">
            @yield('content')
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2024. All rights reserved.</span>
      </span>
    </div>
  </footer>
</div>



</div>

           </div>
    </div>
  </div>
  <!-- <script>
    // Saat form disubmit, ubah nilai checkbox
    document.querySelector('form').addEventListener('submit', function(e) {
        var checkbox = document.getElementById('status');
        // Jika checkbox tidak dicentang, set nilai menjadi 0
        if (!checkbox.checked) {
            checkbox.value = '0';
        } else {
            // Jika checkbox dicentang, set nilai menjadi 1
            checkbox.value = '1';
        }
    });
</script> -->
  <!-- base js -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/js/app.js"></script> -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
  <!-- end base js -->

  <!-- plugin js -->
    <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/chartjs/chart.min.js"></script> -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> -->
  <!-- end plugin js -->

  <!-- common js -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/off-canvas.js"></script> -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/hoverable-collapse.js"></script> -->
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/misc.js"></script>
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/settings.js"></script> -->
  <!-- <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/todolist.js"></script> -->
  <!-- end common js -->
<!--
    <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/dashboard.js"></script> -->
    <script type="text/javascript">
        // Konfigurasi bahasa Indonesia
        $.fn.datepicker.dates['id'] = {
            days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
            daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            daysMin: ["Mi", "Se", "Se", "Ra", "Ka", "Ju", "Sa"],
            months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            today: "Hari ini",
            clear: "Hapus",
            format: "dd MM yyyy",
            titleFormat: "MM yyyy", /* Tampilan di header */
            weekStart: 0
        };

        // Inisialisasi datepicker dengan bahasa Indonesia
        $('.date').datepicker({
            format: 'dd MM yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'id',
        }).on('changeDate', function (e) {
            console.log('Tanggal yang dipilih: ' + e.format('dd MM yyyy'));
        }).on('hide', function () {
            console.log('Kalender ditutup');
        });
    </script>
</body>
</html>
