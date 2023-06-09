<!DOCTYPE html>
<html
  lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" 
  data-assets-path="{{ asset('style/assets/') }}" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Pembayaran Listik</title>
    <meta name="description" content=""  />

    <!-- Icons. Required icon fonts -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/css/core.css')  }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('style/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('style/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('style/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


     <!-- Navbar Menu -->
     <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
          <span class="app-brand-text demo menu-text fw-bolder ms-2">Klikpay</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
      </div>
      <div class="menu-inner-shadow"></div>
    
      <ul class="menu-inner py-1">
    
        <!-- Dashboard -->
        <li class="menu-item  {{ Request::is('beranda') ? 'active' : '' }}">
          <a href="/beranda" class="menu-link">
            <i class='menu-icon tf-icons bx bxs-home-smile'></i>
            <div data-i18n="Analytics">Dashboard</div>
          </a>
        </li>
    
        <!--MENU-->
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Menu</span>
        </li>
        <li class="menu-item  {{ Request::is('halaman/pembayaran') ? 'active' : '' }}">
          <a href="/halaman/pembayaran" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-contact"></i>
            <div data-i18n="Basic">Pembayaran</div>
          </a>
        </li> 
          
        <li class="menu-item  {{ Request::is('halaman/tagihan') ? 'active' : '' }}">
          <a href="/halaman/tagihan" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-receipt"></i>
            <div data-i18n="Basic">Tagihan</div>
          </a>
        </li> 
          
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Lainnya</span></li>
        
        <!-- Laporan -->
        <li class="menu-item">
          <a href="#" class="menu-link">
            <i class='menu-icon tf-icons bx bxs-report'></i>
            <div data-i18n="Laporan">Laporan</div>
          </a>
        </li>
    
        <!-- Data Admin -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-data"></i>
            <div data-i18n="Data Admin">Info User</div>
          </a>
      </ul>
    </aside>
  
    
    <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Hallo "
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
               

                <!-- User -->
                @auth
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('style/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('style/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->name}}</span>
                            <span class="text">{{ auth()->user()->level}}</span>
                          </div>
                          
                          
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bx bx-power-off me-2"></i>logot
                        </button>
                      </form>
                    </li>
                    @endauth
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('konten')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    Coppyright by  
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('style/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('style/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('style/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('style/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('style/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
