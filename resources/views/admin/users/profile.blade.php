@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Edit Profile</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('update.profile',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row" style="margin-bottom:10px">
                <div class="col-md-12">
                    <img src="{{ $user->avatar }}" alt="avatar" class="avatar-img rounded-circle" style="width: 120px;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" placeholder="Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone number</label>
                        <input type="text" required id="phone" class="form-control" placeholder="Phone number" value="{{$user->phone ?? old('phone')}}" name="phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password <span style="color:blue">(Leave empty to use default password: 12345)</span></label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="example-email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$user->email ?? old('email')}}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="customFile">Avatar (Optional)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="avatar" value="{{old('avatar')}}">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection