@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Them</a>
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>Description</td>
            <td>Price</td>
            <td>Content</td>
            <td>Action</td>
        </tr>
        @foreach($listProduct as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ asset('product-images/' . $product->image) }}" width="20%">
                </td>
                <td>{{ $product->desciption }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->content }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">Sua</a>
                    <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div>{!! $listProduct->render() !!}</div>
@endsection
