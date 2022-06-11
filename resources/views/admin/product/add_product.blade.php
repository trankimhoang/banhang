@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.product.add.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Content</label>
                    <input type="text" name="content" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

        </div>
    </div>

@endsection
