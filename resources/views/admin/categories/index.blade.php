@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="h3 mb-0 page-title">Categories</h2>
                @include('includes.alerts')
            </div>
        </div>
        <div class="row align-items-center my-4">
            <div class="col-auto">
                <a href="{{ route('category.create') }}"><button type="button" class="btn btn-primary"><span class="fe fe-plus fe-12 mr-2"></span>Add new</button></a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Order</th> 
                        <th>Clients</th>
                        <th>Status</th> 
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($solutions)
                        @foreach ($solutions as $admin)    
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $admin->title }}</td>
                            
                            <td>{{ $admin->order }}</td>
                            <td>{{$admin->client_count}}</td>
                            <td>{{ ucfirst($admin->status) }}</td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('category.edit',$admin->id)}}">Edit</a>
                                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('category.destroy', $admin->id) }}">Delete</a>        
                                
                                <form id="logout-form" onsubmit="return confirm('Are you really sure?');" action="{{ route('category.destroy', $admin->id) }}" method="POST" style="display: none;">
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
@endsection