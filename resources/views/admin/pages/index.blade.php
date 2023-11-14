@extends('layouts.app')
@section('content')
<div class="col-12">
    <h2 class="page-title">Dashboard</h2>
    <div class="card shadow mb-4">
        @include('includes.alerts')
        <div class="card-body">
            
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