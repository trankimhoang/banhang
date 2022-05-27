@extends('layouts.app_web_master')

@section('title_heading', 'test title')
@section('title', 'Home Page')

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
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @include('web.product.list_include', compact('listProduct'))
    </div>
    <div>
        {!! $listProduct->render() !!}
    </div>
@endsection

