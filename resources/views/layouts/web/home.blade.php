<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title') - DIU Project Repository</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('asset/web/img/core-img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/custom-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/web/css/classy-nav.min.css') }}">
    
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('asset/web/css/style.css')}}">
</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    @include('layouts.web.nav')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    

    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    
    
    <!-- ##### Top Feature Area End ##### -->

    <!-- ##### Course Area End ##### -->
    <div class="container mb-4" style="margin-bottom: 20px !important;">
        @yield('content')
    </div>
    <!-- ##### Testimonials Area Start ##### -->
    
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        @include('layouts.web.footer')
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright <script>document.write(new Date().getFullYear());</script> &copy; All rights are reserved by SkyBlue Team 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### Footer Area Start ##### -->

        <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{asset('asset/web/js/jquery/jquery-2.2.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('asset/web/js/bootstrap/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('asset/web/js/bootstrap/bootstrap.min.js')}}"></script>
        <!-- All Plugins js -->
        <script src="{{asset('asset/web/js/plugins/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{asset('asset/web/js/active.js')}}"></script>
        <script src="{{asset('asset/web/js/main.js')}}"></script>
    </body>

    </html>