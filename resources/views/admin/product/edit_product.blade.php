@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.product.edit.post', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">ID</label>
                    <input type="text" class="form-control" value="{{ $product->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <div>
                        <img src="{{ asset('product-images/' . $product->image) }}" width="50%">
                    </div>
                    <label for="name">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="name">Content</label>
                    <input type="text" name="content" class="form-control" value="{{ $product->content }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

        </div>
    </div>

@endsection
