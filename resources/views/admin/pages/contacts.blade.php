@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="h3 mb-0 page-title">Contact Forms</h2>
                @include('includes.alerts')
            </div>
        </div>
       
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content mb-1" id="pills-tabContent">
                <div class="tab-pane fade show active" id="top-menu" role="tabpanel" aria-labelledby="top-menu-tab"> 
                    <table class="table table-borderless table-hover datatable">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($contacts)
                            @foreach ($contacts as $contact)    
                            <tr>
                                <td> {{ $index++ }}</td>
                                <td>
                                    <p class="mb-0 text-muted"><strong>{{ $contact->firstName . ' ' . $contact->lastName }}</strong> <br>{{ $contact->email }}</p>
                                </td>
                                <td><p class="mb-0 text-muted"><strong>{{ $contact->phoneNumber }}</strong></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ $contact->message }}</strong></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ Carbon\Carbon::parse($contact->created_at)->format('jS \\of F') }}</strong></p></td>

                                {{-- Carbon::parse($b->created_at)->format('jS \\of F') --}}
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#varyModal-{{$contact->id}}" data-whatever="@mdo">View</button>
                                   
                                    <a class="dropdown-item" onclick="return confirm('Are you really sure?');" href="{{ route('contact.form.delete', $contact->id) }}">Delete</a>
                                    
                                    </div>
                                </td>
                            </tr>
                             <div class="modal fade" id="varyModal-{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModal-{{$contact->id}}Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="varyModal-{{$contact->id}}Label">New contact message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label for="firstname" class="col-form-label">First Name:</label>
                                                    <input type="text" class="form-control" value="{{$contact->firstName}}" id="firstname" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="lastname" class="col-form-label">Last Name:</label>
                                                    <input type="text" class="form-control" value="{{$contact->lastName}}" id="lastname" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="businessEmail" class="col-form-label">Business Email:</label>
                                                    <input type="text" class="form-control" value="{{$contact->businessEmail}}" id="businessEmail" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="title" class="col-form-label">Title:</label>
                                                    <input type="text" class="form-control" value="{{$contact->title}}" id="title" disabled>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="companyName" class="col-form-label">Company Name:</label>
                                                    <input type="text" class="form-control" value="{{$contact->companyName}}" id="companyName" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="companySize" class="col-form-label">Company Size:</label>
                                                    <input type="text" class="form-control" value="{{$contact->companySize}}" id="companySize" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="country" class="col-form-label">Country:</label>
                                                    <input type="text" class="form-control" value="{{$contact->country}}" id="country" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="phoneNumber" class="col-form-label">Phone Number:</label>
                                                    <input type="text" class="form-control" value="{{$contact->phoneNumber}}" id="phoneNumber" disabled>
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text" disabled>{{$contact->message}}</textarea>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        
    </div>
@endsection