@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.user.add.post') }}" class="btn btn-primary mb-2">Add</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        @foreach($listUser as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
