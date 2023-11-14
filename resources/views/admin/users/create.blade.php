@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Create Admin</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone number</label>
                        <input type="text" required id="phone" class="form-control" placeholder="Phone number" value="{{old('phone')}}" name="phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password <span style="color:blue">(Leave empty to use default password: 12345)</span></label>
                        <input type="password" id="password" class="form-control">
                    </div>

                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="example-email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select class="custom-select" id="role" name="role" required>
                            <option selected value="">Select role</option>
                            <option value="admin" {{old('role') == 'admin' ? 'selected' : ''}}>Admin</option>
                            <option value="general_staff" {{old('role') == 'general_staff' ? 'selected' : ''}}>General Staff</option>
                            <option value="developer" {{old('role') == 'developer' ? 'selected' : ''}}>Developer</option>
                        </select>
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