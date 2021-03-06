<html lang="en">
<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header trans_300" style="top: -50px;">

        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->

                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                            <li><a href="#"><i class="fa fa-user"
                                                               aria-hidden="true"></i>{{ \Illuminate\Support\Facades\Auth::guard('web')->user()->name }}
                                                </a></li>
                                            <li><a href="{{ route('web.logout') }}"><i class="fa fa-user"
                                                                                       aria-hidden="true"></i>logout</a>
                                            </li>
                                        @else
                                            <li><a href="{{ route('web.login') }}"><i class="fa fa-sign-in"
                                                                                      aria-hidden="true"></i>Sign In</a>
                                            </li>
                                            <li><a href="{{ route('web.register') }}"><i class="fa fa-user-plus"
                                                                                         aria-hidden="true"></i>Register</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="{{ route('web.home') }}">colo<span>shop</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                @foreach(\App\Models\Category::all() as $category)
                                    <li><a href="{{ route('web.detail_category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                            <ul class="navbar_user">

                                <li class="checkout">
                                    <a href="{{ route('web.cart_list_product') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items"
                                              class="checkout_items">{{ array_sum(request()->session()->get('product_carts') ?? []) }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                            <li><a href="#"><i class="fa fa-user"
                                               aria-hidden="true"></i>{{ \Illuminate\Support\Facades\Auth::guard('web')->user()->name }}
                                </a></li>
                            <li><a href="{{ route('web.logout') }}"><i class="fa fa-user" aria-hidden="true"></i>logout</a>
                            </li>
                        @else
                            <li><a href="{{ route('web.login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign
                                    In</a></li>
                            <li><a href="{{ route('web.register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @foreach(\App\Models\Category::all() as $category)
                    <li class="menu_item"><a href="#">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Slider -->


    <div class="main_slider" style="background-image:url({{ asset('theme_user/images/slider_1.jpg') }})">
    </div>
    <div class="container p-3">
        <div class="col-md-12">
            @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                <p>Hiiii, {{ \Illuminate\Support\Facades\Auth::guard('web')->user()->name }}</p>
            @endif
            <form action="{{ route('web.product.search') }}" class="d-flex">
                <input name="s" type="text" class="form-control" placeholder="search..."
                       value="{{ request()->get('s') ?? '' }}">
                <button class="btn btn-primary ml-2"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        @yield('content')
    </div>


    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">??2018 All Rights Reserverd. Made with <i class="fa fa-heart-o"
                                                                                 aria-hidden="true"></i> by <a href="#">Colorlib</a>
                            &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

@hasSection('custom_link_file')
    @yield('custom_link_file')
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('theme_user/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/responsive.css') }}">
    <script src="{{ asset('theme_user/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('theme_user/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('theme_user/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('theme_user/js/custom.js') }}"></script>
@endif
</body>
</html>
