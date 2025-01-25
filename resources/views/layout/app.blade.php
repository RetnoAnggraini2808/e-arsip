<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themewagon.github.io/kaiadmin-lite/tables/datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Nov 2024 15:17:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{$title}}</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset ('assets/gambar/logo.png') }}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{asset ('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{asset ('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{asset ('assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset ('assets/css/demo.css') }}" />

    <style>
      .nav-item a.active {
        color: #ffffff; /* Warna teks */
        background-color: #1c1e27; /* Warna latar belakang aktif */
        font-weight: bold;
      }
    </style>

    {{-- Feather Icon --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- FontAwesome --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{asset ('fontawesome-free-6.7.1/css/all.css') }}">

    {{-- BEGIN: SweetAlert2 --}}
    <link rel="stylesheet" href="{{asset('assets/skydash/themes/assets/package/dist/sweetalert2.min.css')}}">
    
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin') }}" class="logo" >
              <img
                src="{{asset ('assets/gambar/logo.png') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="40"
              />
              <span style="padding-left: 10px; color: #ffffff">PTPN 4 Palm Co</span>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              @if ($name->status===1)
              <li class="nav-item">
                <a
                  href="{{ route('admin') }}"
                  class="{{ request()->is('admin') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Data Master</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('role')}}">
                        <span class="sub-item">Data Role</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('user')}}">
                        <span class="sub-item">Data User</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datask')}}"
                  class="{{ request()->is('datask') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope-open-text"></i>
                  <p>Data SK</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datamemo')}}"
                  class="{{ request()->is('datamemo') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope"></i>
                  <p>Data Memo</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datasuratmasuk')}}"
                  class="{{ request()->is('datasuratmasuk') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-inbox"></i>
                  <p>Data Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('dataintern')}}"
                  class="{{ request()->is('dataintern') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-inbox"></i>
                  <p>Data Surat Intern</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('histori')}}"
                  class="{{ request()->is('histori') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-clock-rotate-left"></i>
                  <p>History</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Exits</h4>
              </li>

              @else
              <li class="nav-item">
                <a
                  href="{{ route('krani') }}"
                  class="{{ request()->is('krani') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Data Jenis Surat</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('jenissk')}}">
                        <span class="sub-item">Data Jenis SK</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('jenismemo')}}">
                        <span class="sub-item">Data Jenis Memo</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('jenisSuratMasuk') }}">
                        <span class="sub-item">Data Surat Masuk</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('JenisSuratIntern') }}">
                        <span class="sub-item">Jenis Surat Intern</span>
                      </a>
                    </li>
                   
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datask')}}"
                  class="{{ request()->is('datask') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope-open-text"></i>
                  <p>Data SK</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datamemo')}}"
                  class="{{ request()->is('datamemo') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope"></i>
                  <p>Data Memo</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('datasuratmasuk')}}"
                  class="{{ request()->is('datasuratmasuk') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-inbox"></i>
                  <p>Data Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('dataintern')}}"
                  class="{{ request()->is('dataintern') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-inbox"></i>
                  <p>Data Surat Intern</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{route('histori')}}"
                  class="{{ request()->is('histori') ? 'active' : '' }}"
                  aria-expanded="false"
                >
                  <i class="fas fa-clock-rotate-left"></i>
                  <p>History</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Exits</h4>
              </li>

              @endif

              <li class="nav-item">
                <a
                  href="{{ route ('logout') }}"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-right-from-bracket"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="assets/template-bootstrap5/themewagon.github.io/kaiadmin-lite/index.html" class="logo">
                <img
                  src="https://themewagon.github.io/kaiadmin-lite/assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              {{-- <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav> --}}

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                {{-- <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="{{asset ('assets/img/profile.jpg') }}"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">Hizrian</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="{{asset ('assets/img/profile.jpg') }}"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>Hizrian</h4>
                            <p class="text-muted">hello@example.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li> --}}
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        @yield('content')

        {{-- Start Footer --}}
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                {{-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    Polkam
                  </a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li> --}}
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="#">Poltek-kampar</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="#">Retno Anggraini</a>.
            </div>
          </div>
        </footer>
      </div>
    </div>

    {{-- end Footer --}}
    {{-- Script Sweetalert2 --}}
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

    {{-- Feather Icon --}}
    <script>
      feather.replace();
    </script>
    <!--   Core JS Files   -->
    <script src="{{asset ('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{asset ('assets/js/core/popper.min.js') }}"></script>
    <script src="{{asset ('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset ('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{asset ('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{asset ('assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset ('assets/js/setting-demo2.js') }}"></script>
    <script>
      $(document).ready(function () {

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
  </body>
</html>