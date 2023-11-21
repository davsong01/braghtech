@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="row align-items-center my-4">
        <div class="col">
            <h2 class="h3 mb-0 page-title">Admins</h2>
            @include('includes.alerts')
        </div>
        <div class="col-auto">
            <a href=""><button type="button" class="btn btn-primary"><span class="fe fe-plus fe-12 mr-2"></span>Add new admin</button></a>
        </div>
        </div>
        <div class="card shadow">
        <div class="card-body">
            <table class="table table-borderless table-hover">
            <thead>
                <tr>
                <th>S/N</th>
                <th>Avatar</th>
                <th>Details</th> 
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($admins)
                @foreach ($admins as $admin)    
                <tr>
                    <td> {{ $index++ }}
                    </td>
                    <td>
                        <div class="avatar avatar-sm">
                        <img src="{{asset($admin->avatar)}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 text-muted"><strong>{{ $admin->name }}</strong></p>
                        <small class="mb-0 text-muted">{{ $admin->email }}</small>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $admin->phone }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ ucfirst($admin->role) }}</p>
                    </td>
                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('users.edit',$admin->id)}}">Edit</a>
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('destroy-user').submit()" href="{{ route('users.destroy', $admin->id) }}">Delete</a>        
                
                        <form id="destroy-user" onsubmit="return confirm('Are you really sure?');" action="{{ route('users.destroy', $admin->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            </table>
        </div>
        </div>
        {{ $admins->links() }}
        
    </div>
@endsection