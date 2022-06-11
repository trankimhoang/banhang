@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.category.add') }}" class="btn btn-primary">Them</a>
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
        @foreach($listCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}">Sua</a>
                    <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
