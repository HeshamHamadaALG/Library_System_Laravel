@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>
                <form action="{{ route('categories.store') }}" method="post">
                    <div class="card-body">
                        @csrf
                        <label>Title</label>
                        <input type="string" class="form-control" name="name" />
                    </div>
                    <div class="card-body">
                        @csrf
                        <label>Description</label>
                        <input type="longText" class="form-control" name="description" />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection