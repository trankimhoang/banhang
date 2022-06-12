@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.category.add') }}" class="btn btn-primary mb-2">Add Category</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($listCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
