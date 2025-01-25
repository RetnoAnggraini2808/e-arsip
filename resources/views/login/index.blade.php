<!doctype html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | PTPN IV Palm CO</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/gambar/logo.png')}}" />
  <link rel="stylesheet" href="{{asset ('login/assets/css/styles.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/css/show-password-toggle.css')}}">

  <!-- inject:css -->
  <link rel="shortcut icon" href="{{ asset('assets/gambar/logo.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/skydash/themes/assets/package/dist/sweetalert2.min.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/vendors/feather/feather.css')}}">

  <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-4">
            <div class="card mb-0">
              <div class="card-body">
                <a href="index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/gambar/logo.png')}}" width="120" alt="">
                </a>
                <form action="{{route('loginaksi')}}" class="pt-3" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" name="username" class="form-control"
                      placeholder="Username" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                      <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        Show
                      </button>
                    </div>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/skydash/themes/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <script src="{{ asset('assets/skydash/themes/assets/js/show-password-toggle.js')}}"></script>
  <script>
    feather.replace();
  </script>
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <script src="{{ asset('assets/skydash/themes/assets/package/dist/sweetalert2.all.min.js') }}"></script>
  <script>
      @if (Session::has('success'))
          Swal.fire({
              title: '{{ Session::get('success') }}',
              icon: 'success',
              confirmButtonText: 'OK'
          });
      @endif
      @if (Session::has('error'))
          Swal.fire({
              title: '{{ Session::get('error') }}',
              icon: 'error',
              confirmButtonText: 'OK'
          });
      @endif
  </script>
  
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');
  
    togglePassword.addEventListener('click', function () {
      // Toggle the password field type
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
  
      // Toggle button text
      this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
  </script>

  <script src="{{asset ('login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{asset ('login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>