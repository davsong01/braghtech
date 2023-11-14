@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="h3 mb-0 page-title">Menus</h2>
                @include('includes.alerts')
            </div>
        </div>
        <div class="row align-items-center my-4">
            <div class="col-auto">
                <a href="{{ route('menu.create') }}"><button type="button" class="btn btn-primary"><span class="fe fe-plus fe-12 mr-2"></span>Add new Menu</button></a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="top-menu-tab" data-toggle="pill" href="#top-menu" role="tab" aria-controls="top-menu" aria-selected="true">Top Menus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="jump-menu-tab" data-toggle="pill" href="#jump-menu" role="tab" aria-controls="jump-menu" aria-selected="false">Jump Menus</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Footer Menus</a>
                </li>
                </ul>
                <div class="tab-content mb-1" id="pills-tabContent">
                <div class="tab-pane fade show active" id="top-menu" role="tabpanel" aria-labelledby="top-menu-tab"> 
                    <table class="table table-borderless table-hover datatable">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Menu Name</th>
                            <th>Status</th> 
                            <th>Order</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($main_menu)
                            @foreach ($main_menu as $admin)    
                            <tr>
                                <td> {{ $index++ }}</td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->name }}</strong> <br><a href="{{ $admin->url }}">{{ $admin->url }}</a></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ ucfirst($admin->status) }}</strong></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->order }}</strong></p></td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('menu.edit',$admin->id)}}">Edit</a>
                                    
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('menu.destroy', $admin->id) }}">Delete</a>        
                                    
                                
                                <form id="logout-form" onsubmit="return confirm('Are you really sure?');" action="{{ route('menu.destroy', $admin->id) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="jump-menu" role="tabpanel" aria-labelledby="jump-menu-tab">
                    <table class="table table-borderless table-hover datatable">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Menu Name</th>
                            <th>Status</th> 
                            <th>Order</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($jump_menu)
                            @foreach ($jump_menu as $admin)    
                            <tr>
                                <td> {{ $index1++ }}</td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->name }}</strong> <br><a href="{{ $admin->url }}">{{ $admin->url }}</a></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ ucfirst($admin->status) }}</strong></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->order }}</strong></p></td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('menu.edit',$admin->id)}}">Edit</a>
                                    
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('menu.destroy', $admin->id) }}">Delete</a>        
                                    
                                
                                <form id="logout-form" onsubmit="return confirm('Are you really sure?');" action="{{ route('menu.destroy', $admin->id) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
                    <table class="table table-borderless table-hover datatable">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Menu Name</th>
                            <th>Status</th> 
                            <th>Order</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($footer_menu)
                            @foreach ($footer_menu as $admin)    
                            <tr>
                                <td> {{ $index2++ }}</td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->name }}</strong> <br><a href="{{ $admin->url }}">{{ $admin->url }}</a></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ ucfirst($admin->status) }}</strong></p></td>
                                <td><p class="mb-0 text-muted"><strong>{{ $admin->order }}</strong></p></td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('menu.edit',$admin->id)}}">Edit</a>
                                    
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('menu.destroy', $admin->id) }}">Delete</a>        
                                    
                                
                                <form id="logout-form" onsubmit="return confirm('Are you really sure?');" action="{{ route('menu.destroy', $admin->id) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>
@endsection