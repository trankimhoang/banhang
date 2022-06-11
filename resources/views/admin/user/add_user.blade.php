@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.user.add.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

        </div>
    </div>
@endsection
