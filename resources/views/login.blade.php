
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SJG || {{  $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/vendor/iconfonts/iconicons/dist/ionicons.css">
    <link rel="stylesheet" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/vendor/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/vendor/css/vendor.bundle.base.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-admin-free/jquery/src/assets/css/shared/style.css">
    <link rel="stylesheet" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/vendor/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="https://internet-progaming.mos.ap-southeast-3.sufybkt.com/assets/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form action="#">
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" id="email" placeholder="Enter Email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="password" placeholder="Enter Password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button  class="btn btn-primary btn-round btn-lg btn-block btn-login mb-3">{{ __('Login') }}</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="register" class="text-black text-small">Create new account</a>
                  </div>
                </form>
              </div>
              <p class="footer-text text-center">copyright © 2024. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://idoxbku.sufydely.com/assets/vendor/js/vendor.bundle.addons.js"></script>
    <script src="https://idoxbku.sufydely.com/assets/vendor/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="https://idoxbku.sufydely.com/assets/js/shared/off-canvas.js"></script>
    <script src="https://idoxbku.sufydely.com/assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <script src="https://idoxbku.sufydely.com/assets/js/shared/jquery.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".btn-login").click( function() {

                var email = $("#email").val();
                var password = $("#password").val();
                var token = $("meta[name='csrf-token']").attr("content");

                if(email.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat Email Wajib Diisi !'
                    });

                } else if(password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else {

                    $.ajax({

                        url: "{{ route('actionlogin') }}",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data: {
                            "email": email,
                            "password": password,
                            "_token": token
                        },

                        success:function(response){

                            if (response.success) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Anda akan di arahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                    .then (function() {
                                        window.location.href = "{{ route('dashboard') }}";
                                    });

                            } else {

                                console.log(response.success);

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                        },

                        error:function(response){

                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });

                            console.log(response);

                        }

                    });

                }

            });

        });
    </script>
  </body>
</html>
