<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>{{$title}} - Waetopia</title>  	
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('fe/images/logo-travel.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('fe/images/logo-travel.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/bootstrap.min.css') }}">    
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/custom.css') }}">

    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Tambahkan library jQuery jika belum -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Tambahkan library Mapify -->
    <script src="https://cdn.jsdelivr.net/npm/mapify-js/dist/mapify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mapify-js/dist/mapify.min.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/flaticon.css') }}">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/fontawesome/css/all.min.css') }}">
    <!-- magnific CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/frontend/gijgo.min.css') }}">
    <!-- niceselect CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/nice-select.css') }}">
    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('fe/frontend/style.css') }}">
	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('fe/images/logo-panjang.png') }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('gallery') ? 'active' : '' }}">
                            <a class="nav-link" href="/gallery">Gallery</a>
                        </li>
                        <li class="nav-item {{ Request::is('packages') ? 'active' : '' }}">
                            <a class="nav-link" href="/packages">Packages</a>
                        </li>
                        <li class="nav-item {{ Request::is('booking') ? 'active' : '' }}">
                            <a class="nav-link" href="/booking">Reservation</a>
                        </li>
                        <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
                            <a class="nav-link" href="/news">News</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link " href="/contact">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @auth('pelanggan')
                            <!-- Jika user sudah login -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="nav-item fa fa-user-circle"></i>
                                    Howdy, {{ Auth::guard('pelanggan')->user()->name ?? Auth::guard('pelanggan')->user()->email }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('auth_fe.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @endauth

                        @guest('pelanggan')
                            <!-- Jika user belum login -->
                            <li class="nav-item">
                                <a class="nav-link btn-login mr-2" href="{{route('auth_fe.login')}}">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-login" href="{{route('register.index')}}">Sign Up</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    
    @yield('content')
    @yield('banner')
    @yield('about')
    @yield('quotes')
    @if ($title === 'Packages')
        @yield('packages')
    @endif
    @if ($title === 'Tour Detail')
        @yield('tour_detail')
    @endif
    @if ($title === 'Gallery')
        @yield('gallery')
    @endif
    @yield('contact')
    @if ($title === 'News')
        @yield('news')
    @endif
    @if ($title === 'News Detail')
        @yield('news_detail')
    @endif
    @if ($title === 'Booking')
        @yield('booking')
    @endif
    @yield('product')
    @yield('galeri')
    @yield('testimonial')

    <!-- Start Contact info -->
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Phone</h4>
                        <p class="lead">
                            +62 812 9437 8943
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            damarnugroho199@gmail.com
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">
                            Perum Griya anggraini, Citeureup Bogor
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->
    
    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3>About Us</h3>
                    <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Opening hours</h3>
                    <p><span class="text-color">Monday :</span> 5:AM - 10PM</p>
                    <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Sat-Sun :</span> Closed</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Contact information</h3>
                    <p class="lead">Griya Anggraini, Citeureup, Bogor</p>
                    <p class="lead"><a href="#">+62 812 9437 8943</a></p>
                    <p><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJNvvcgXfDqlbNJNPCzzdVPrhZJLmxKfpwlhvfWZGKNbctTcCgGsktFBdmvMbtDtZtDhzsq" target="_blank"> damarnugroho199@gmail.com</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Subscribe</h3>
                    <div class="subscribe_form">
                        <form class="subscribe_form">
                            <input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
                            <button type="submit" class="submit">SUBSCRIBE</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="https://x.com/Damzznugroho09" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/damar-nugroho-utomo-ab2276310/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="https://github.com/damskuyy" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/damarrngrh_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Travel Agency</a> Design By : 
                    <a href="https://html.design/">html design</a></p>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- End Footer -->
    
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('fe/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/popper.min.js') }}"></script>
    <script src="{{ asset('fe/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('fe/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('fe/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('fe/js/isotope.min.js') }}"></script>
    <script src="{{ asset('fe/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('fe/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('fe/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('fe/js/custom.js') }}"></script>

    <!-- jquery plugins here-->
    <script src="{{ asset('fe/frontend/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('fe/frontend/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('fe/frontend/js/bootstrap.min.js') }}"></script>
    <!-- magnific js -->
    <script src="{{ asset('fe/frontend/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('fe/frontend/js/owl.carousel.min.js') }}"></script>
    <!-- masonry js -->
    <script src="{{ asset('fe/frontend/js/masonry.pkgd.js') }}"></script>
    <!-- masonry js -->
    <script src="{{ asset('fe/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('fe/frontend/js/gijgo.min.js') }}"></script>
    <!-- contact js -->
    <script src="{{ asset('fe/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('fe/frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('fe/frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('fe/frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('fe/frontend/js/contact.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('fe/frontend/js/custom.js') }}"></script>
</body>
</html>