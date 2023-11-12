<!doctype html>
<html lang="es">


<head>
    <title>Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>
</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

// TODO: Fix Header and desing
<div class="page-header min-vh-80" style="background-color: #ffffff">
    {{-- <span class="mask bg-gradient-dark opacity-6"></span> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="text-center">
                    <h1 class="text-white"></h1>
                    <h3 class="text-white"></h3>
                </div>
            </div>
        </div>
    </div>
</div>


  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n10" style="padding: 0">

    
    <div class="row mt-n10" >
        <div class="col-md-11 mx-auto">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="border-radius: 10px !important">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-2-min.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
          </div>
        </div>
      </div>
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Your main section here</h2>
      </div>
    </div>
</div>
  
{{--  <footer class="footer pt-5 mt-5">--}}
{{--    <div class="container">--}}
{{--      <div class=" row">--}}
{{--        <div class="col-md-3 mb-4 ms-auto">--}}
{{--          <div>--}}
{{--            <a href="#">--}}
{{--              <img class="mb-3 footer-logo" src={{asset('img/logo-ct-dark.png')}} alt="main_logo">--}}
{{--            </a>--}}
{{--            <h6 class="font-weight-bolder mb-4">Material Kit 2</h6>--}}
{{--          </div>--}}
{{--          <div>--}}
{{--            <ul class="d-flex flex-row ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-facebook text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-twitter text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-dribbble text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-github text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-youtube text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Company</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  About Us--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Freebies--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Premium Tools--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Blog--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Resources</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Illustrations--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Bits & Snippets--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Affiliate Program--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Help & Support</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Contact Us--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Knowledge Center--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Custom Development--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Sponsorships--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Legal</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Terms & Conditions--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Privacy Policy--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Licenses (EULA)--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-12">--}}
{{--          <div class="text-center">--}}
{{--            <p class="text-dark my-4 text-sm font-weight-normal">--}}
{{--              All rights reserved. Copyright ©--}}
{{--              <script>--}}
{{--                document.write(new Date().getFullYear())--}}
{{--              </script> Material Kit by <a href="#" target="_blank">Creative Tim</a>.--}}
{{--            </p>--}}
{{--          </div>--}}
       {{-- </div> --}}
</div>
</div>
</footer>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
