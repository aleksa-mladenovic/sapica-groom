<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

        <!-- CSS Files -->    
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    {{-- Trending Product slider css --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />

    {{-- Font robit --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{-- Search --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

    <style>
        a{
            text-decoration: none !important;
            color: black;
        }
    </style>
</head>
<body>
    @include('layouts.inc.front_nav')
    <div class="container-fluid px-0">
         @yield('content')
    </div>


   <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
          </div>
          <div>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
            <a href="https://www.instagram.com/marija_maca_mladenovic/" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </section>
  
        <section>
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">   
                <div class="col-md-6 mx-auto mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11505.337866786631!2d21.393491566683174!3d43.86962133567518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ecdb660536a10f7!2sSapica%20Grooming%20Sisanje%20Pasa%20Paracin!5e0!3m2!1sen!2srs!4v1664474253487!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                      <i class="fas fa-gem me-3"></i>Project details
                    </h6>
                    <p>
                        This web site is a universty project in the subject Web Programing 
                        done by Aleksa Mladenovic, index number 258,
                        Faculty of Sciences and Mathematics, Nis, september 2022.
                    </p>
                </div>
  
                <div class="col-md-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p>
                        <i class="fas fa-home me-3"></i> 
                        Paracin, Srbija
                    </p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        aleksa.mldenovic@pmf.edu.rs
                    </p>
                    <p>
                        <i class="fas fa-phone me-3"></i> 
                        +381 65 9571-178
                    </p>
                </div>
            </div>
        </section>
    </footer>

    {{-- Trending Product slider scripts --}}
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Search script --}}
    <script>
        $.ajax({
            type: "GET",
            url: "/product-list",
            success: function (response) {
                startAutoComplete(response);
            }
        });
    
        function startAutoComplete(availableTags){
            $( "#search_id" ).autocomplete({
                source: availableTags
            });   
        }
        </script>

    @yield('scripts')

    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
@endif
</body>
</html>
