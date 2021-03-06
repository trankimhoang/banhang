@extends('layouts.app_web_master')

@section('title_heading', 'test title')

@section('title', 'Cart')

@section('description_heading', 'mo ta title')

@section('menu')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
           aria-expanded="false">Shop</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">All Products</a></li>
        </ul>
    </li>
@endsection

@section('content')
    <div class="row">
        @if(count($listProduct) > 0)
            @foreach($listProduct as $product)
            <div class="col-md-3">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset($product->getImagePath() ?? 'no_img.png') }}" alt="..."/>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product price-->
                            {{ $product->price }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <p>So luong: {{ $product->amount_cart }}</p>
                        <div class="text-center" style="padding-top: 10px">
                            <a class="btn btn-outline-dark mt-auto" href="#">Detail</a>
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('web.delete_cart', ['id' => $product->id]) }}">Delete</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        @else
            <span class="badge badge-danger">Khong co san pham trong gio hang</span>
        @endif
    </div>
@endsection
