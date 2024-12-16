
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="https://demo.bootstrapdash.com/star-laravel-pro/template/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">Register</h2>
              <div class="auto-form-wrapper">
                <form action="#">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" id="nama" class="form-control" placeholder=" Enter Name">
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="email" id="email" class="form-control" placeholder=" Enter Email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-at"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" id="password" class="form-control" placeholder="Enter Password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-register submit-btn btn-block">Register</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="/" class="text-black text-small">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('assets/js/shared/jquery.cookie.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

{{-- <script>
    $(document).ready(function() {

        $(".btn-register").click( function() {

            var nama = $("#nama").val();
            var email    = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if (nama.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Lengkap Wajib Diisi !'
                });

            } else if(email.length == "") {

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

                //ajax
                $.ajax({

                    url: "{{ route('actionregister') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "nama": nama,
                        "email": email,
                        "password": password,
                        "_token": token
                    },

                    success:function(response){

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil!',
                                text: 'silahkan login!'
                                    timer: 3000,
                            });.then (function() {
                                        window.location.href = "{{ route('login') }}";
                                    });

                            $("#nama").val('');
                            $("#email").val('');
                            $("#password").val('');

                        } else {

                            Swal.fire({
                                type: 'error',
                                title: 'Register Gagal!',
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
                    }

                })

            }

        });

    });
</script> --}}
<script>
    $(document).ready(function() {

        $(".btn-register").click(function() {

            var nama = $("#nama").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if (nama.length == "") {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Nama Lengkap Wajib Diisi !'
                });

            } else if (email.length == "") {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Email Wajib Diisi !'
                });

            } else if (password.length == "") {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });

            } else {

                // AJAX
                $.ajax({
                    url: "{{ route('actionregister') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "nama": nama,
                        "email": email,
                        "password": password,
                        "_token": token
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil!',
                                text: 'Silakan login dalam 3 detik atau klik tombol di bawah!',
                                timer: 3000, // Timer 3 detik
                                showConfirmButton: true,
                                confirmButtonText: 'Ke Halaman Login'
                            }).then((result) => {
                                // Jika pengguna klik tombol
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('login') }}";
                                }
                            });

                            // Pengalihan otomatis setelah 3 detik jika tidak klik tombol
                            setTimeout(() => {
                                window.location.href = "{{ route('login') }}";
                            }, 3000);

                            // Reset form
                            $("#nama").val('');
                            $("#email").val('');
                            $("#password").val('');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Register Gagal!',
                                text: 'Silakan coba lagi!'
                            });
                        }

                        console.log(response);
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Server error!'
                        });
                    }
                });
            }
        });
    });
</script>

  </body>
</html>
