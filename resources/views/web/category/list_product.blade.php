@extends('layouts.app_web_master')
@section('content')
    <div class="row">
        <div class="col-md-12">
             <h1>{{ $category->name }}</h1>
        </div>
    </div>

    <div class="row">
        @if($category->Products->count() > 0)
            @php
                $listProduct = $category->Products;
            @endphp

            @include('web.product.list_include', compact('listProduct'))
        @else
            <div class="col-md-12">
                <p class="text-danger">Khong co san pham</p>
            </div>
        @endif
    </div>

@endsection

