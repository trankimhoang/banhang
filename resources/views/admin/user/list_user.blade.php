@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.user.add.post') }}" class="btn btn-primary">Them</a>
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Action</td>
        </tr>
        @foreach($listUser as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
