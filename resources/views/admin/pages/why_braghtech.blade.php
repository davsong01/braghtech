@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Why braghtech Page</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card shadow">
            <div class="card-body py-4 mb-1">
                <form action="{{route('why.braghtech.update')}}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title">Header Title</label>
                                    <input type="text" id="header_title" name="header_title" class="form-control" placeholder="Header title" value="{{ $why->header_title ?? old('header_title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title">Header Description</label>
                                    <input type="text" id="header_description" name="header_description" class="form-control" placeholder="Header Description" value="{{ $why->header_description ?? old('header_description') }}" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label for="header_button_text">Header button Text</label>
                                    <input type="text" id="header_button_text" name="header_button_text" class="form-control" placeholder="Header button text" value="{{ $why->header_button_text ?? old('header_button_text')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="header_button_link">Header button Link</label>
                                    <input type="text" id="header_button_link" name="header_button_link" class="form-control" placeholder="Header button link" value="{{ $why->header_button_link ?? old('header_button_link')}}">
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="header_button_status">Header button status</label>
                                    <select class="form-control" id="header_button_status" name="header_button_status" required>
                                        <option value="" selected>Select...</option>
                                        <option value="active" {{ isset($why->header_button_status) && $why->header_button_status == 'active' ? 'selected':'' }}>Active</option>
                                        <option value="inactive" {{ isset($why->header_button_status) && $why->header_button_status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="who_are_we_text">Who we are text</label>
                                    <textarea class="form-control" id="summary-ckeditor1" name="who_are_we_text" cols="500" required value="{{ $why->who_are_we_text ?? old('who_are_we_text') }}">{!! $why->who_are_we_text ?? old('who_are_we_text') !!}</textarea>
                                </div>
                            </div>
                            @if(isset($why->who_are_we_image))
                            <div class="col-md-6" style="display: flex;">
                                <div class="col-md-2" style="padding: 0;">
                                    <img src="{{$why->who_are_we_image ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                </div>
                                <div class="col-md-10" style="padding-right: 0;">
                                    <div class="form-group mb-3">
                                        <label for="who_are_we_image">Replace Who we are Image (429px x 560px)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="who_are_we_image" name="who_are_we_image" accept="image/*">
                                            <label class="custom-file-label" for="who_are_we_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="who_are_we_image">Who we are Image (429px x 560px)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="who_are_we_image" name="who_are_we_image" accept="image/*">
                                        <label class="custom-file-label" for="who_are_we_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="who_are_we_status">Who we are status</label>
                                    <select class="form-control" id="who_are_we_status" name="who_are_we_status" required>
                                        <option value="" selected>Select...</option>
                                        <option value="active" {{  isset($why->who_are_we_status) && $why->who_are_we_status == 'active' ? 'selected':'' }}>Active</option>
                                        <option value="inactive" {{  isset($why->who_are_we_status) && $why->who_are_we_status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="our_mission_text">Our mission text</label>
                                    <textarea class="form-control" id="summary-ckeditor2" name="our_mission_text" cols="500" required value="{{ $why->our_mission_text ?? old('our_mission_text') }}">{!! $why->our_mission_text ?? old('our_mission_text') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="our_mission_status">Our mission status</label>
                                    <select class="form-control" id="our_mission_status" name="our_mission_status" required>
                                        <option value="" selected>Select...</option>
                                        <option value="active" {{  isset($why->our_mission_status) && $why->our_mission_status == 'active' ? 'selected':'' }}>Active</option>
                                        <option value="inactive" {{  isset($why->our_mission_status) && $why->our_mission_status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="our_vision_text">Our Vision Text</label>
                                    <textarea class="form-control" id="summary-ckeditor3" name="our_vision_text" cols="500" required value="{{ $why->our_vision_text ?? old('our_vision_text') }}">{!! $why->our_vision_text ?? old('our_vision_text') !!}</textarea>
                                </div>
                            </div>
                            @if(isset($why->our_vision_image))
                            <div class="col-md-6" style="display: flex;">
                                <div class="col-md-2" style="padding: 0;">
                                    <img src="{{$why->our_vision_image ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                </div>
                                <div class="col-md-10" style="padding-right: 0;">
                                    <div class="form-group mb-3">
                                        <label for="our_vision_image">Replace Who we are Image (429px x 560px)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="our_vision_image" name="our_vision_image" accept="image/*">
                                            <label class="custom-file-label" for="our_vision_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="our_vision_image">Our Vision Image (420px x 275px)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="our_vision_image" name="our_vision_image" accept="image/*">
                                        <label class="custom-file-label" for="our_vision_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="our_vision_status">Our Vision status</label>
                                    <select class="form-control" id="our_vision_status" name="our_vision_status" required>
                                        <option value="" selected>Select...</option>
                                        <option value="active" {{  isset($why->our_vision_status) && $why->our_vision_status == 'active' ? 'selected':'' }}>Active</option>
                                        <option value="inactive" {{  isset($why->our_vision_status) && $why->our_vision_status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="why_choose_us_text">Why Choose Us Text</label>
                                    <textarea class="form-control" id="summary-ckeditor4" name="why_choose_us_text" cols="500" required value="{{ $why->why_choose_us_text ?? old('why_choose_us_text') }}">{!! $why->why_choose_us_text ?? old('why_choose_us_text') !!}</textarea>
                                </div>
                            </div>
                            @if(isset($why->why_choose_us_image))
                            <div class="col-md-6" style="display: flex;">
                                <div class="col-md-2" style="padding: 0;">
                                    <img src="{{$why->why_choose_us_image ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                </div>
                                <div class="col-md-10" style="padding-right: 0;">
                                    <div class="form-group mb-3">
                                        <label for="why_choose_us_image">Replace Why choose us Image (250px x 327px)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="why_choose_us_image" name="why_choose_us_image" accept="image/*">
                                            <label class="custom-file-label" for="why_choose_us_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="why_choose_us_image">Why choose us Image (250px x 327px)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="why_choose_us_image" name="why_choose_us_image" accept="image/*">
                                        <label class="custom-file-label" for="why_choose_us_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="why_choose_us_status">Why choose Us status</label>
                                    <select class="form-control" id="why_choose_us_status" name="why_choose_us_status" required>
                                        <option value="" selected>Select...</option>
                                        <option value="active" {{  isset($why->why_choose_us_status) && $why->why_choose_us_status == 'active' ? 'selected':'' }}>Active</option>
                                        <option value="inactive" {{  isset($why->why_choose_us_status) && $why->why_choose_us_status == 'inactive' ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <input type="submit" style="width: 100%;" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

 
    <script>
        CKEDITOR.replace('summary-ckeditor1');
        CKEDITOR.replace('summary-ckeditor2');
        CKEDITOR.replace('summary-ckeditor3');
        CKEDITOR.replace('summary-ckeditor4');
    </script>

@endsection