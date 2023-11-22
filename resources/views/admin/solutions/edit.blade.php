@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Edit Solution</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('solutions.update', $solution->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $solution->title ?? old('title')}}" placeholder="Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Description</label>
                        <textarea id="description" class="form-control" name="description" value="{{ $solution->description ?? old('description') }}" id="" cols="30" rows="5">{{ $solution->description ?? old('description') }}</textarea>
                    </div>
                    @if(isset($solution->image ))
                    <div class="col-md-12" style="display: flex;padding: 0px;">
                        <div class="col-md-2" style="padding: 0;">
                            <img src="{{ $solution->image ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                        </div>
                        <div class="col-md-10" style="padding-right: 0;">
                            <div class="form-group mb-3">
                                <label for="section1_image">Replace solution Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="image">Solution Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="section1_image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                     {{-- <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="image" value="{{old('image')}}" name="image" accept="image">
                    </div> --}}
                </div> <!-- /.col -->
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="url">Url</label>
                        <input type="text" id="url" class="form-control" placeholder="url" value="{{ $solution->url ?? old('url')}}" name="url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="link_name">Link Name</label>
                        <input type="text" id="link_name" class="form-control" name="link_name" value="{{ $solution->link_name ?? old('link_name')}}" placeholder="link_name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option selected value="">Select Status</option>
                            <option value="active" {{ $solution->status == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ $solution->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <select class="custom-select" id="order" name="order" required>
                            <option selected value="">Select solution order</option>
                            @foreach($range as $order)
                            <option value="{{ $order }}" {{ $solution->order == $order ? 'selected' : ''}}>{{$order}}</option>
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