@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.product.add.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-bold">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Category</label>
                    <div>
                        @foreach($listCategory as $category)
                            <input type="checkbox" name="category[]" value="{{ $category->id }}">
                            <p>{{ $category->name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Content</label>
                    <input type="text" name="content" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </form>

        </div>
    </div>

@endsection
