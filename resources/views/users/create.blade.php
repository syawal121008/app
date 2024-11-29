@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="card-title"> Form Create User</div>
            </div>
            <form action="{{route('user.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="card-form-group">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif

        </div>
        <div class="card-form-group">
            <label for="email" class="form-label">Email</label>
        <input type="email"class="form-control" name="email" value="{{old('email')}}"></br>
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif</br>
        </div>
        <div class="card-form-group">
            <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" value="{{old('password')}}">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
        </div>
        <div class="card-form-group">
            <div class="form-check">
            <input type="radio" name="role" value="Admin" class="form-check-input" checked>
            <label for="admin" class="form-check-label">Admin</label>
            </div>
            <div class="form-check"></div>
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
</form>