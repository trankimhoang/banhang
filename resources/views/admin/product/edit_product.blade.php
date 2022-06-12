@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.product.edit.post', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-bold">ID</label>
                    <input type="text" class="form-control" value="{{ $product->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Category</label>
                    <div>
                        @foreach($listCategory as $category)
                            @if(!empty($categorysOfProduct[$category->id]))
                                <input type="checkbox" name="category[]" value="{{ $category->id }}" checked>
                            @else
                                <input type="checkbox" name="category[]" value="{{ $category->id }}">
                            @endif
                            <p>{{ $category->name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <img src="{{ asset('product-images/' . $product->image) }}" width="50%">
                    </div>
                    <label for="name" class="text-bold">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Content</label>
                    <input type="text" name="content" class="form-control" value="{{ $product->content }}">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </form>
        </div>
    </div>

@endsection
