@extends('layouts.app_web_master')

@section('title_heading', 'test title')

@section('title', 'Search')

@section('description_heading', 'mo ta title')

@section('content')
    <div class="row">
        @include('web.product.list_include', compact('listProduct'))
    </div>
    <div>
        {!! $listProduct->render() !!}
    </div>
@endsection

