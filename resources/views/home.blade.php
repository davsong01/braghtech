@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="row">

    </div> <!-- end section -->
    <div class="row">
        <!-- Striped rows -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">Admin Management</h2>
            <p class="mb-4">Add, update and delete admins here</p>
            @include('includes.alerts')
            <div class="card shadow">
                <div class="card-body">
                    <div class="toolbar row mb-3">
                        
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <a href="{{route('users.create')}}" class="btn btn-primary float-right ml-3" type="button">+ Add Admin</a>
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                    <table class="table table-bordered datatable">
                        <thead>
                            <tr role="row">
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $count ++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $user->role)) }}</td>
                                <td>
                                    <div class="mb-2">
                                        <a href="{{ route('users.edit', $user->id)}}" type="button" class="btn mb-2 btn-info"><span class="fe fe-edit fe-16 mr-2"></span>Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are you really sure?');" style="display: inline;">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            
                                            <button type="submit" type="button" class="btn mb-2 btn-danger"><span class="fe fe-trash fe-16 mr-2"></span>Delete</button>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->

</div> <!-- .col-12 -->
@endsection