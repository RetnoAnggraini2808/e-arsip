<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.bootstrapdash.com/skydash/themes/vertical-default-light/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Oct 2024 13:02:51 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ARSIP PTPN 4 PALM CO</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/css/show-password-toggle.css')}}">

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/skydash/themes/assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/gambar/logo.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/skydash/themes/assets/package/dist/sweetalert2.min.css')}}">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <a href="{{ route ('admin') }}"><img src="{{ asset('assets/gambar/logo.png')}}" alt="logo"></a>
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              
              <form action="{{route('loginaksi')}}" class="pt-3" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="text-primary" data-feather="user"></i>
                      </span>
                    </div>
                    <input type="email" name="username" class="form-control form-control-lg border-left-0"
                      placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="text-primary" data-feather="lock"></i>
                      </span>
                    </div>
                    <input type="password" id="password" class="form-control form-control-lg border-left-0" name="password"
                      placeholder="Password" required>
                    <div class="input-group-append">
                      <button class="" type="button" id="togglePassword">
                        <i class="text-primary" data-feather="eye"></i>
                      </button>
                    </div>
                  </div>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="text-primary" data-feather="lock"></i>
                    </span>
                  </div>
                  <input type="password" id="password"  class="form-control rounded-right" name="password" placeholder="Password" required>
                  <button id="toggle-password" type="button" class="d-none"
                    aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                  </button>
                </div>
                
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                </div>
                <div class="my-3 d-grid gap-2">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow me-1">
                    <i class="ti-facebook me-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ms-1">
                    <i class="ti-google me-2"></i>Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 All
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

 
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/skydash/themes/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <script src="{{ asset('assets/skydash/themes/assets/js/show-password-toggle.js')}}"></script>

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
    feather.replace();
  </script>
  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordField = document.getElementById('password');
      const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', passwordFieldType);

      // Toggle icon
      this.querySelector('i').setAttribute('data-feather', passwordFieldType === 'password' ? 'eye' : 'eye-off');
      feather.replace(); // Update Feather icons
    });
  </script>

  
  <!-- inject:js -->
  <script src="{{ asset('assets/skydash/themes/assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/skydash/themes/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/skydash/themes/assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/skydash/themes/assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/skydash/themes/assets/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from demo.bootstrapdash.com/skydash/themes/vertical-default-light/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Oct 2024 13:02:51 GMT -->
</html>