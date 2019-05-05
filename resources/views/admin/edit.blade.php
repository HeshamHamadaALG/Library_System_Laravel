@extends('layouts.dash')
@section('content')
    <div class="content-wrapper" style="margin-left: 50px;">
        <section class="content-header">
            <h1>
                User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">User</li>
            </ol>
        </section>
        <section class="content">
        
            <div class="row">
                <form method="post" action="{{ route('admins.update' , ['id'=>$manager->id]) }}">
                    @method('put')
                    @csrf
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">Username:</label>
                            <input type="text" id="exampleInputFile" name="name" value="{{ $manager->name }}"
                                    class="form-control">
                            @if($errors->has('name')) <span
                                    style="color: red">{{ $errors->first('name') }}</span> @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">Email:</label>
                            <input type="email" id="exampleInputFile" name="email" value="{{ $manager->email }}"
                                    class="form-control">
                            @if($errors->has('email')) <span
                                    style="color: red">{{ $errors->first('email') }}</span> @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">Phone:</label>
                            <input type="number" id="exampleInputFile" name="phone" value="{{ $manager->phone }}"
                                    class="form-control">
                            @if($errors->has('phone')) <span
                                    style="color: red">{{ $errors->first('phone') }}</span> @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('NationalID') ? 'has-error' : '' }}">
                            <label for="exampleInputFile">National ID:</label>
                            <input type="number" id="exampleInputFile" name="NationalID" value="{{ $manager->NationalID }}"
                                    class="form-control">
                            @if($errors->has('NationalID')) <span
                                    style="color: red">{{ $errors->first('NationalID') }}</span> @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="btn-group">
                            <label for="exampleInputFile">Type:</label>
                            <select name="type">
                                <option value="manager">Manager</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary col-md-3" value="update">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection