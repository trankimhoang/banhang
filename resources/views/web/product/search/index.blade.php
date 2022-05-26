@extends('layouts.app_web_master')

@section('title_heading', 'test title')

@section('description_heading', 'mo ta title')

@section('content')
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @include('web.product.list_include', compact('listProduct'))
    </div>
    <div>
        {!! $listProduct->render() !!}
    </div>
@endsection

