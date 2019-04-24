@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-8 ">
            <ul class="list-group">
                <li class="list-group-item">Name: {{$user->name}}</li>
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Phone: {{$user->phone}}</li>
                <li class="list-group-item">National ID: {{$user->NationalID}}</li>
            </ul>
        </div>
        <div class="col-md-4">
                <a class="btn btn-primary" href="{{ route('users.edit',Auth::id()) }}" role="button">Edit</a>
        </div>
    </div>
</div>
@endsection
