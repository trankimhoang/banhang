@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.user.edit.post', ['id' => $user->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="name" class="text-bold">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </form>

        </div>
    </div>
@endsection
