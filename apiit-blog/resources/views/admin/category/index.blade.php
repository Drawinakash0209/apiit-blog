
@extends('layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        @if (session('message'))

        <div class="alert alert-success">{{ session('message')}}</div>
            
        @endif
    </div>
    
@endsection