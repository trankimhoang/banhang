@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.category.edit.post', ['id' => $category->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $category->description }}">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
