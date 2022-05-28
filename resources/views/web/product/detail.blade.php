@extends('layouts.app_web_master')

@section('custom_link_file')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('theme_user/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_user/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_user/styles/single_responsive.css') }}">
    <script src="{{ asset('theme_user/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('theme_user/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('theme_user/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('theme_user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('theme_user/js/single_custom.js') }}"></script>
@endsection

@section('content')
    <div class="row" style="margin-top: 10%;">
        <div class="col-lg-7">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                        <div class="single_product_thumbnails">
                            <ul>
                                @foreach($product->Images as $image)
                                    <li><img src="{{ asset($image->path) }}" alt="" data-image="{{ asset($image->path) }}"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url({{ asset($product->getImagePath()) }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->content }}</p>
                </div>
                <div class="product_price">{{ $product->price }}</div>
                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <div class="red_button add_to_cart_button"><a href="{{ route('web.add_cart', ['id' => $product->id]) }}">add to cart</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
