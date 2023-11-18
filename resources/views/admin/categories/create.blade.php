@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Create Category</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}" placeholder="Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option selected value="">Select Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    
                </div> <!-- /.col -->
                
                <div class="col-md-6">
                    
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <select class="custom-select" id="order" name="order" required>
                            <option selected value="">Select order</option>
                            @foreach($range as $order)
                            <option value="{{ $order }}" {{ old('order') == $order ? 'selected' : ''}}>{{$order}}</option>
                            @endforeach
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