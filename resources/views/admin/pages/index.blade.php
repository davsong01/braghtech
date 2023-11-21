@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Dashboard</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('users.index') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-dark">
                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Admins</p>
                                    <span class="h3 mb-0">{{$admins}}</span>
                                    <span class="small text-success"></span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('client.index') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe fe-book fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Clients</p>
                                    <span class="h3 mb-0">{{$clients}}</span>
                                    <span class="small text-success">({{ $active_clients}} active)</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('solutions.index') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-info">
                                    <i class="fe fe-16 fe fe-grid fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Solutions</p>
                                    <span class="h3 mb-0">{{$solutions}}</span>
                                    <span class="small text-success">({{ $active_solutions}} active)</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('service.index') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe fe-server fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Services</p>
                                    <span class="h3 mb-0">{{$services}}</span>
                                    <span class="small text-success">({{ $active_services}} active)</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('partner.index') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-success">
                                    <i class="fe fe-16 fe fe-user fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Partners</p>
                                    <span class="h3 mb-0">{{$partners}}</span>
                                    <span class="small text-success">({{ $active_partners}} active)</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <a href="{{ route('submitted.forms.contacts') }}" style="text-decoration: unset !important;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-danger">
                                    <i class="fe fe-16 fe fe-folder fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Pending Messages</p>
                                    <span class="h3 mb-0">{{$newMessages}}</span>
                                    <span class="small text-success"> Pending messages</span>
                                </div>
                                </div>
                            </div>
                        </div>

                    </a>
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

    </script>

@endsection