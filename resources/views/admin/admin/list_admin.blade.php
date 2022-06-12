@extends('layouts.app')
@section('title', 'List Admin')
@section('content')
    <a href="{{ route('admin.admin.add.post') }}" class="btn btn-primary mb-2">Add Admin</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($listAdmin as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('admin.admin.edit', ['id' => $admin->id]) }}" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.admin.delete', ['id' => $admin->id]) }}" class="btn btn-danger">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
