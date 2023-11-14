@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Create Menu</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('menu.store')}}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}" placeholder="Menu Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <select class="custom-select" id="order" name="order" required>
                            <option selected value="">Select menu order</option>
                            @foreach($range as $order)
                            <option value="{{ $order }}" {{ old('order') == $order ? 'selected' : ''}}>{{$order}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Type</label>
                        <select class="custom-select" id="type" name="type" required>
                            <option selected value="">Select Type</option>
                            <option value="top" {{ old('type') == 'top' ? 'selected' : ''}}>Top Menu</option>
                            <option value="jump" {{ old('type') == 'jump' ? 'selected' : ''}}>Jump Menu</option>
                            <option value="footer" {{ old('type') == 'footer' ? 'selected' : ''}}>Footer Menu</option>
                        </select>
                    </div>
                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="url">Url</label>
                        <input type="text" required id="url" class="form-control" placeholder="Menu url" value="{{old('url')}}" name="url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option selected value="">Select Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
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