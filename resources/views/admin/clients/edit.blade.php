@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Create Client</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $client->title ?? old('title')}}" placeholder="Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Category</label>
                        <select class="custom-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $client->category_id == $item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(isset($client->image ))
                    <div class="col-md-12" style="display: flex;padding: 0px;">
                        <div class="col-md-2" style="padding: 0;">
                            <img src="{{ $client->image ?? ''}}" alt="" style="width: 70px;height:70px;margin-bottom: 15px;"> <br>
                        </div>
                        <div class="col-md-10" style="padding-right: 0;">
                            <div class="form-group mb-3">
                                <label for="section1_image">Replace client Image</label>
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
                            <label for="image">Client Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option selected value="">Select Status</option>
                            <option value="active" {{ $client->status == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ $client->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <select class="custom-select" id="order" name="order" required>
                            <option selected value="">Select order</option>
                            @foreach($range as $order)
                            <option value="{{ $order }}" {{ $client->order == $order ? 'selected' : ''}}>{{$order}}</option>
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