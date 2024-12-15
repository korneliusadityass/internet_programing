
<!DOCTYPE html>
<html>
<head>
  <title>Star Admin Pro Laravel Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="uNVSm5nA5TkDq47DOb8dni7iHdaNQi8gYkR18cq7">

  <link rel="shortcut icon" href="https://demo.bootstrapdash.com/star-laravel-pro/template/favicon.ico">

  <!-- plugin css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

    <!-- <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/plugin.css"> -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">
  <!-- end common css -->

  </head>
<body data-base-url="https://demo.bootstrapdash.com/star-laravel-pro/template">
  <div class="container-scroller" id="app">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="https://demo.bootstrapdash.com/star-laravel-pro/template">
    <img src="{{ asset('assets/images/PT_SINGA_JAYA_GROUP.png') }}" style="height: 40px!important; width: 100%!important;" alt="logo"></a>
    <a class="navbar-brand brand-logo-mini" href="https://demo.bootstrapdash.com/star-laravel-pro/template">
      <img src="{{ asset('assets/images/—Pngtree—leo horoscope constellations background_1368811.jpg') }}" style="height: 40px!important; width: 100%!important;" alt="logo"> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">Richard V.Welsh !</span>
          <img class="img-xs rounded-circle" src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/images/faces/face8.jpg" alt="Profile image">
          <i class="fa-solid fa-caret-down" style="font-size: 15px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a class="dropdown-item p-0">
            <div class="d-flex border-bottom w-100 justify-content-center">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
              </div>
            </div>
          </a>
          <a class="dropdown-item mt-2"> Manage Accounts </a>
          <a class="dropdown-item"> Change Password </a>
          <a class="dropdown-item"> Check Inbox </a>
          <a class="dropdown-item"> Sign Out </a>
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
<div class="theme-setting-wrapper">
  <div id="color-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
    </div>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
      <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
    </div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme">
      <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
    </div>
    <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
    <div class="color-tiles mx-0 px-2">
      <div class="tiles primary"></div>
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles pink"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
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
            <p class="profile-name">Richard V.Welsh</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Manager</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a class="dropdown-item"> Sign Out </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="https://demo.bootstrapdash.com/star-laravel-pro/template">
        <i class="menu-icon fa-solid fa-house"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon fa-solid fa-book"></i>
        <span class="menu-title">Pegawai</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
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
        <div class="card text-center" style="position: relative; height: 80vh;">
          <!-- Logo Utama di Tengah -->
          <div class="card-body d-flex align-items-center justify-content-center" style="margin-bottom: 300px;">
            <img src="{{ asset('assets/images/PT_SINGA_JAYA_GROUP.png') }}" alt="logo">
          </div>

          <!-- Gambar Kecil di Tengah Bawah -->
          <div class="position-absolute d-flex justify-content-center align-items-center" style="bottom: 50px; left: 0; right: 0; gap: 20px;">
            <img src="{{ asset('assets/images/pexels-lukas-577210.jpg') }}" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
            <img src="{{ asset('assets/images/image-56.png') }}" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
            <img src="{{ asset('assets/images/istockphoto-1285583141-170667a.jpg') }}" alt="logo" class="img-fluid" style="max-width: 250px; height: auto;">
          </div>
        </div>
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
<!-- <div class="card-body d-flex align-items-center justify-content-center">
          <img src="{{ asset('assets/images/PT_SINGA_JAYA_GROUP.png') }}" alt="logo"></a>
          </div> -->
           </div>
    </div>
  </div>

  <!-- base js -->
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/js/app.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- end base js -->

  <!-- plugin js -->
    <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/chartjs/chart.min.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/off-canvas.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/hoverable-collapse.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/misc.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/settings.js"></script>
  <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/dashboard.js"></script>
</body>
</html>
