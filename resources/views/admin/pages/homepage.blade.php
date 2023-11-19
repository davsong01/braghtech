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
                                @if(isset($section_1['image']))
                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-2" style="padding: 0;">
                                        <img src="{{ $section_1['image'] ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                    </div>
                                    <div class="col-md-10" style="padding-right: 0;">
                                        <div class="form-group mb-3">
                                            <label for="section1_image">Replace Section Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="section1_image" name="section1_image" accept="image/*">
                                                <label class="custom-file-label" for="section1_image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="section1_image">Section Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="section1_image" name="section1_image" accept="image/*">
                                            <label class="custom-file-label" for="section1_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="button_1_text">Button 1 Text</label>
                                        <input type="text" id="button_1_text" name="button_1_text" class="form-control" placeholder="Button 1 text" value="{{ $section_1['button_1_text'] ?? old('button_1_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="button_1_link">Button 1 Link</label>
                                        <input type="text" id="button_1_link" name="button_1_link" class="form-control" placeholder="Button 1 link" value="{{ $section_1['button_1_link'] ?? old('button_1_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="button_1_status">Button 1 status</label>
                                        <select class="form-control" id="button_1_status" name="button_1_status" required>
                                            <option value="" selected>Select...</option>
                                            <option value="active" {{  isset($section_1['button_1_status']) && $section_1['button_1_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_1['button_1_status']) && $section_1['button_1_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
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
                                        <input type="text" id="button_2_link" name="button_2_link" class="form-control" placeholder="Button 2 link" value="{{ $section_1['button_2_link'] ?? old('button_2_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="button_2_status">Button 2 status</label>
                                        <select class="form-control" id="button_2_status" name="button_2_status" required>
                                            <option value="" selected>Select...</option>
                                            <option value="active" {{  isset($section_1['button_2_status']) && $section_1['button_2_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_1['button_2_status']) && $section_1['button_2_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{  isset($section_1['status']) && $section_1['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_1['status']) && $section_1['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 100%;" class="btn btn-primary" value="Submit">
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
                                        <?php 
                                            $toDisplay = !empty($section_2['solutions']) && $section_2['solutions'] != 'null' ? json_decode($section_2['solutions'], true) : [];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12" style="display: contents;">
                                                @if($solutions)
                                                @foreach ($solutions as $item)
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sol-{{$item->id}}" name="solutions[]" value="{{$item->id}}" {{ in_array($item->id, $toDisplay) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sol-{{$item->id}}">{{$item->title}} </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif   
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
                                        <input type="text" id="view_more_link" name="view_more_link" class="form-control" placeholder="View more link" value="{{ $section_2['view_more_link'] ?? old('view_more_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="view_more_status">View more Status</label>
                                        <select class="form-control" id="view_more_status" name="view_more_status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{ isset($section_2['view_more_status']) && $section_2['view_more_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_2['view_more_status']) && $section_2['view_more_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{  isset($section_2['status']) && $section_2['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_2['status']) && $section_2['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 100%;" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="section" value="section2">
                        </form>
                    </div>
                    <div class="tab-pane fade mb-4" id="section-3" role="tabpanel" aria-labelledby="section-3-tab">
                        <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h3>Section 3 Settings</h3>
                                
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="title_1">Title 1</label>
                                        <input type="text" id="title_1" name="title_1" class="form-control" placeholder="Title 1" value="{{ $section_3['title_1'] ?? old('title_1')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="description_1">Description 1</label>
                                        <textarea class="form-control" id="summary-ckeditor2" name="description_1" cols="500" required value="{{ $section_3['description_1'] ?? old('description_1') }}">{!! $section_3['description_1'] ?? old('description_1') !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="button_1_text">Button 1 Text</label>
                                        <input type="text" id="button_1_text" name="button_1_text" class="form-control" placeholder="Button 1 text" value="{{ $section_3['button_1_text'] ?? old('button_1_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="button_1_link">Button 1 Link</label>
                                        <input type="text" id="button_1_link" name="button_1_link" class="form-control" placeholder="Button 1 link" value="{{ $section_3['button_1_link'] ?? old('button_1_link')}}">
                                    </div>
                                </div>
                                @if(isset($section_3['left_image']))
                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-2" style="padding: 0;">
                                        <img src="{{ $section_3['left_image'] ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                    </div>
                                    <div class="col-md-10" style="padding-right: 0;">
                                        <div class="form-group mb-3">
                                            <label for="left_image">Replace left Image <small>(Dimensions preferably: 512px X 380px)</small></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="left_image" name="left_image" accept="image/*">
                                                <label class="custom-file-label" for="left_image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="left_image">Left Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="left_image" name="left_image" accept="image/*">
                                            <label class="custom-file-label" for="left_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            
                                
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_1_title">Bullet 1 title</label>
                                        <input type="text" id="bullet_1_title" name="bullet_1_title" class="form-control" placeholder="Bullet 1 title" value="{{ $section_3['bullet_1_title'] ?? old('bullet_1_title')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_1_description">Bullet 1 description</label>
                                        <input type="text" id="bullet_1_description" name="bullet_1_description" class="form-control" placeholder="Bullet 1 description" value="{{ $section_3['bullet_1_description'] ?? old('bullet_1_description')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_1_status">Bullet 1 status</label>
                                        <select class="form-control" id="bullet_1_status" name="bullet_1_status" required>
                                            <option value="" selected>Select...</option>
                                            <option value="active" {{  isset($section_3['bullet_1_status']) && $section_3['bullet_1_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_3['bullet_1_status']) && $section_3['bullet_1_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_2_title">Bullet 2 title</label>
                                        <input type="text" id="bullet_2_title" name="bullet_2_title" class="form-control" placeholder="Bullet 2 title" value="{{ $section_3['bullet_2_title'] ?? old('bullet_2_title')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_2_description">Bullet 2 description</label>
                                        <input type="text" id="bullet_2_description" name="bullet_2_description" class="form-control" placeholder="Bullet 2 description" value="{{ $section_3['bullet_2_description'] ?? old('bullet_2_description')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_2_status">Bullet 2 status</label>
                                        <select class="form-control" id="bullet_2_status" name="bullet_2_status" required>
                                            <option value="" selected>Select...</option>
                                            <option value="active" {{  isset($section_3['bullet_2_status']) && $section_3['bullet_2_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_3['bullet_2_status']) && $section_3['bullet_2_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_3_title">Bullet 3 title</label>
                                        <input type="text" id="bullet_3_title" name="bullet_3_title" class="form-control" placeholder="Bullet 3 title" value="{{ $section_3['bullet_3_title'] ?? old('bullet_3_title')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_3_description">Bullet 3 description</label>
                                        <input type="text" id="bullet_3_description" name="bullet_3_description" class="form-control" placeholder="Bullet 3 description" value="{{ $section_3['bullet_3_description'] ?? old('bullet_3_description')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="bullet_3_status">Bullet 3 status</label>
                                        <select class="form-control" id="bullet_3_status" name="bullet_3_status" required>
                                            <option value="" selected>Select...</option>
                                            <option value="active" {{  isset($section_3['bullet_3_status']) && $section_3['bullet_3_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_3['bullet_3_status']) && $section_3['bullet_3_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{  isset($section_3['status']) && $section_3['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_3['status']) && $section_3['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 100%;" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="section" value="section3">
                        </form>
                    </div>
                    <div class="tab-pane fade mb-4" id="section-4" role="tabpanel" aria-labelledby="section-4-tab">
                        <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h3>Section 4 Settings</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="button_1_status">Services to display</label>
                                        <?php 
                                            $toDisplay2 = !empty($section_4['services'])  && $section_4['services'] != 'null' ? json_decode($section_4['services'], true) : [];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12" style="display: contents;">
                                                @if($services)
                                                @foreach ($services as $item)
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="serv-{{$item->id}}" name="services[]" value="{{$item->id}}" {{ in_array($item->id, $toDisplay2) ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="serv-{{$item->id}}">{{$item->title}} </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="read_more_text">Read more Text</label>
                                        <input type="text" id="read_more_text" name="read_more_text" class="form-control" placeholder="Read more text" value="{{ $section_4['read_more_text'] ?? old('read_more_text')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="read_more_link">Read more Link</label>
                                        <input type="text" id="read_more_link" name="read_more_link" class="form-control" placeholder="Read more link" value="{{ $section_4['read_more_link'] ?? old('read_more_link')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="view_more_status">View more Status</label>
                                        <select class="form-control" id="read_more_status" name="read_more_status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{ isset($section_4['read_more_status']) && $section_4['read_more_status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_4['read_more_status']) && $section_4['read_more_status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{  isset($section_4['status']) && $section_4['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{  isset($section_4['status']) && $section_4['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input type="submit" style="width: 100%;" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="section" value="section4">
                        </form>
                    </div>
                    <div class="tab-pane fade mb-4" id="section-5" role="tabpanel" aria-labelledby="section-5-tab">
                         <form action="{{route('homepage.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h3>Section 5 Settings</h3>
                                </div>
                                
                                @if(isset($section_5['section5_image']))
                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-2" style="padding: 0;">
                                        <img src="{{ $section_5['section5_image'] ?? ''}}" alt="" style="width: 90px;margin-bottom: 15px;"> <br>
                                    </div>
                                    <div class="col-md-10" style="padding-right: 0;">
                                        <div class="form-group mb-3">
                                            <label for="section5_image">Replace Section Image (1028px x 195px)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="section5_image" name="section5_image" accept="image/*">
                                                <label class="custom-file-label" for="section5_image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="section5_image">Section Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="section5_image" name="section5_image" accept="image/*">
                                            <label class="custom-file-label" for="section5_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                @endif  
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="status"><strong>Section Status</strong></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="" selected>Select..</option>
                                            <option value="active" {{ isset($section_5['status']) && $section_5['status'] == 'active' ? 'selected':'' }}>Active</option>
                                            <option value="inactive" {{ isset($section_5['status']) && $section_5['status'] == 'inactive' ? 'selected':'' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="section" value="section5">
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
                </div>
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

    </script>

@endsection