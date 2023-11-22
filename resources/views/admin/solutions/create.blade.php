@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Create Solution</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('solutions.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}" placeholder="Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Description</label>
                        <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                    </div>
                     <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="image" value="{{old('image')}}" name="image" accept="image/*">
                    </div>
                </div> <!-- /.col -->
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="url">Url</label>
                        <input type="text" id="url" class="form-control" placeholder="url" value="{{old('url')}}" name="url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="link_name">Link Name</label>
                        <input type="text" id="link_name" class="form-control" name="link_name" value="{{ old('link_name')}}" placeholder="link_name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option selected value="">Select Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <select class="custom-select" id="order" name="order" required>
                            <option selected value="">Select solution order</option>
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