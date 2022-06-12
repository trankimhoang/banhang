@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.product.add') }}" class="btn btn-primary mb-2">Add Product</a>
    <table class="table table-bordered">
        <tr>
            <th width="5%">ID</th>
            <th width="20%">Name</th>
            <th width="15%">Category</th>
            <th width="20%">Image</th>
            <th width="10%">Description</th>
            <th width="5%">Price</th>
            <th width="10%">Content</th>
            <th width="15%">Action</th>
        </tr>
        @foreach($listProduct as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach($product->Categorys as $category)
                        <p>{{ $category->name }}</p>
                    @endforeach
                </td>
                <td>
                    @if(is_file(public_path('product-images/' . $product->image)))
                        <img src="{{ asset('product-images/' . $product->image) }}" width="50%">
                    @endif
                </td>
                <td>{{ $product->desciption }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->content }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div>{!! $listProduct->render() !!}</div>
@endsection
