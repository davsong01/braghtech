@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">General Setting</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <form action="{{ route('general-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="company_name" class="form-control" name="company_name" value="{{$setting->company_name ?? old('company_name')}}" placeholder="Company Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Facebook Link</label>
                        <input type="text" required id="facebook_link" placeholder="Enter Facebook link" class="form-control" name="facebook_link" value="{{$setting->facebook_link ?? old('facebook_link')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Twitter Link</label>
                        <input type="text" required id="twitter_link" placeholder="Enter Twitter link" class="form-control" name="twitter_link" value="{{$setting->facebook_link ?? old('facebook_link')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Instagram Link</label>
                        <input type="text" required id="instagram_link" placeholder="Enter Instagram link" class="form-control" name="instagram_link" value="{{$setting->facebook_link ?? old('facebook_link')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">LinkedIn</label>
                        <input type="text" required id="linkedin_link" placeholder="Enter LinkedIn link" class="form-control" name="linkedin_link" value="{{$setting->linkedin_link ?? old('linkedin_link')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">WhatsApp chat number</label>
                        <input type="text" required id="whatspp_chat_number" placeholder="Enter Whataspp number" class="form-control" name="whatspp_chat_number" value="{{$setting->whatspp_chat_number ?? old('whatspp_chat_number')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Company Phone</label>
                        <input type="text" required id="company_phone" placeholder="Enter company phone" class="form-control" name="company_phone" value="{{$setting->company_phone ?? old('company_phone')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    @if(isset($setting->company_logo))
                    <div class="col-md-12" style="display:flex;margin-bottom: 10px;">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <img src="{{ $setting->company_logo }}" alt="" style="width:64px">
                        </div>
                        <div class="col-md-10">
                            <label for="url">Replace Company logo</label>
                            <input type="file" id="company_logo" class="form-control" name="company_logo" accept="image/*">
                        </div>
                    </div> 
                    @else 
                    <div class="form-group mb-3">
                        <label for="url">Company logo</label>
                        <input type="file" required id="company_logo" class="form-control" name="company_logo" accept="image/*">
                    </div>
                    @endif
                    @if(isset($setting->company_favicon))
                    <div class="col-md-12" style="display:flex">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <img src="{{ $setting->company_favicon }}" alt="" style="width:64px">
                        </div>
                        <div class="col-md-10">
                            <label for="url">Replace Company favicon</label>
                            <input type="file" id="company_favicon" class="form-control" name="company_favicon" accept="image/*">
                        </div>
                    </div>
                    @else 
                    <div class="form-group mb-3">
                        <label for="url">Company favicon</label>
                        <input type="file" required id="company_favicon" class="form-control" name="company_favicon" accept="image/*">
                    </div>
                    @endif
                    <br>
                    
                    <div class="form-group mb-3">
                        <label for="simpleinput">Company meta title</label>
                        <input type="text" id="company_meta_title" class="form-control" name="company_meta_title" value="{{$setting->company_meta_title ?? old('company_meta_title')}}" placeholder="Company Meta Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Company meta description</label>
                        <textarea class="form-control" name="company_meta_description" id="company_meta_description" cols="30" rows="13" value={{$setting->company_meta_description ?? old('company_meta_description')}}>{{$setting->company_meta_description ?? old('company_meta_description')}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Update" style="width: 50%;">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection