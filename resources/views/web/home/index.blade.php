@extends('layouts.app_web_master')

@section('title_heading', 'test title')

@section('description_heading', 'mo ta title')

@section('content')
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach($listProduct as $product)
            <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
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
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        {!! $listProduct->render() !!}
    </div>
@endsection

