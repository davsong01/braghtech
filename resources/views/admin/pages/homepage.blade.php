@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Homepage</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card shadow">
            <div class="card-body py-4 mb-1">
                <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="section-1-tab" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">Section 1</a>
                    <a class="nav-link" id="section-2-tab" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">Section 2</a>
                    <a class="nav-link" id="section-3-tab" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">Section 3</a>
                    <a class="nav-link" id="section-4-tab" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">Section 4</a>
                    <a class="nav-link" id="section-5-tab" data-toggle="pill" href="#section-5" role="tab" aria-controls="section-5" aria-selected="false">Section 5</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content mb-4" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h3>Section 1 Settings</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="title">Section Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Section 1 title" value="{{ $section_1['title'] ?? old('title')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="description">Section description</label>
                                        <textarea class="form-control" id="summary-ckeditor1" name="description" cols="500" required value="{{ $section_1['description'] ?? old('description') }}">{!! $section_1['description'] ?? old('description') !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="section1_image">Section Image</label>
                                        <img src="{{ $section_1['image'] ?? ''}}" alt="" style="width: 150px;margin-bottom: 15px;"> <br>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="section1_image" name="section1_image" value="{{old('section1_image')}}">
                                            <label class="custom-file-label" for="section1_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="button_1_text">Button 1 Text</label>
                                        <input type="text" id="button_1_text" name="button_1_text" class="form-control" placeholder="Button 1 text" value="{{ $section_1['button_1_text'] ?? old('button_1_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="button_1_link">Button 1 Link</label>
                                        <input type="text" id="button_1_link" name="button_1_link" class="form-control" placeholder="Button 1 text" value="{{ $section_1['button_1_link'] ?? old('button_1_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="button_1_status">Button 1 status</label>
                                        <select class="form-control" id="button_1_status" name="button_1_status" required>
                                            <option value="" selected>Select...</option>
                                            <option selected value="active" {{  isset($section_1['button_1_status']) && $section_1['button_1_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option selected value="inactive" {{  isset($section_1['button_1_status']) && $section_1['button_1_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="button_2_text">Button 2 Text</label>
                                        <input type="text" id="button_2_text" name="button_2_text" class="form-control" placeholder="Button 2 text" value="{{ $section_1['button_2_text'] ?? old('button_2_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="button_2_link">Button 2 Link</label>
                                        <input type="text" id="button_2_link" name="button_2_link" class="form-control" placeholder="Button 2 text" value="{{ $section_1['button_2_link'] ?? old('button_2_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="button_2_status">Button 2 status</label>
                                        <select class="form-control" id="button_2_status" name="button_2_status" required>
                                            <option value="" selected>Select...</option>
                                            <option selected value="active" {{  isset($section_1['button_2_status']) && $section_1['button_2_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option selected value="inactive" {{  isset($section_1['button_2_status']) && $section_1['button_2_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option selected value="active" {{  isset($section_1['status']) && $section_1['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option selected value="inactive" {{  isset($section_1['status']) && $section_1['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 50%;" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="section" value="section1">
                        </form>
                    </div>
                    <div class="tab-pane fade mb-4" id="section-2" role="tabpanel" aria-labelledby="section-2-tab">
                        <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h3>Section 2 Settings</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="button_1_status">Solutions to display</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="view_more_text">View more Text</label>
                                        <input type="text" id="view_more_text" name="view_more_text" class="form-control" placeholder="View more text" value="{{ $section_2['view_more_text'] ?? old('view_more_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="view_more_link">View more Link</label>
                                        <input type="text" id="view_more_link" name="view_more_link" class="form-control" placeholder="View more link" value="{{ $section_2['view_more_link'] ?? old('button_1_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="view_more_status">View more Status</label>
                                        <select class="form-control" id="view_more_status" name="view_more_status">
                                            <option value="" selected>Select..</option>
                                            <option selected value="active" {{  isset($section_2['view_more_status']) && $section_2['view_more_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option selected value="inactive" {{  isset($section_2['view_more_status']) && $section_2['view_more_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option selected value="active" {{  isset($section_2['status']) && $section_2['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option selected value="inactive" {{  isset($section_2['status']) && $section_2['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 50%;" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="section" value="section2">
                        </form>
                    </div>
                    <div class="tab-pane fade mb-4" id="section-3" role="tabpanel" aria-labelledby="section-3-tab"> sect 3 </div>
                    <div class="tab-pane fade mb-4" id="section-4" role="tabpanel" aria-labelledby="section-4-tab"> sec 4 </div>
                    <div class="tab-pane fade mb-4" id="section-5" role="tabpanel" aria-labelledby="section-5-tab"> sec 5 </div>
                    </div>

                   
                </div>
                </div>
                </div>
            </div>
        </div>
            {{-- <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-12">
                <h3>Section 1</h3>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="section1_title">Section Title</label>
                        <input type="text" id="section1_title" name="section1_title" class="form-control" placeholder="Section 1 title" value="{{ $section1['section1_title'] ?? old('section1_title')}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="section1_text">Section text</label>
                        <textarea class="form-control" id="summary-ckeditor1" name="section1_text" cols="500" required value="{{ old('section1_text')  ??  $section1['section1_text'] }}">{!! $section1['section1_text'] !!}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="section1_image">Section Image</label> <br>
                        <img src="{{ $section1['section1_image'] ?? ''}}" alt="" style="width: 150px;margin-bottom: 15px;"> <br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section1_image" name="section1_image" value="{{old('section1_image')}}">
                            <label class="custom-file-label" for="section1_image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Button 1 text</label>
                        <input type="text" id="section1_button1_text" class="form-control" name="section1_button1_text" value="{{ $section1['section1_button1_text'] ?? old('section1_button1_text')}}" placeholder="Button 1 text" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="simpleinput">Button 2 text</label>
                        <input type="text" id="section1_button2_text" class="form-control" name="section1_button2_text" value="{{ $section1['section1_button2_text'] ?? old('section1_button2_text')}}" placeholder="Button 2 text" required>
                    </div>

                </div> <!-- /.col -->
                
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </form> --}}
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

 
    <script>
        CKEDITOR.replace('summary-ckeditor1');

    </script>

@endsection