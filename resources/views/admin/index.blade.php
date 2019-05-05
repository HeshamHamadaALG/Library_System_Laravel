@extends('layouts.dash')
@section('content')
    <div class="content-wrapper" style="margin-left: 50px;">
        <section class="content-header">
            <h1>
                Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Users</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="margin: 37px 0; text-align: center">User</h3>
                        </div>
                        <form  method="post" action="{{ route('admins.store') }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="exampleInputicon">Username:</label>
                                    <input type="text" class="form-control" id="exampleInputimage" name="name">
                                    @if($errors->has('name')) <span style="color: red">{{ $errors->first('name') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="exampleInputFile">Email:</label>
                                    <input type="email" id="exampleInputFile" name="email" class="form-control">
                                    @if($errors->has('email')) <span
                                            style="color: red">{{ $errors->first('email') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="exampleInputFile">Password:</label>
                                    <input type="password" id="exampleInputFile" name="password" class="form-control">
                                    @if($errors->has('password')) <span
                                            style="color: red">{{ $errors->first('password') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="exampleInputFile">Confirm Password:</label>
                                    <input type="password" id="exampleInputFile" name="password" class="form-control">
                                    @if($errors->has('password')) <span
                                            style="color: red">{{ $errors->first('password') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="exampleInputFile">Phone:</label>
                                    <input type="number" id="exampleInputFile" name="phone" class="form-control">
                                    @if($errors->has('phone')) <span
                                            style="color: red">{{ $errors->first('phone') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('nationalID') ? 'has-error' : '' }}">
                                    <label for="exampleInputFile">National ID:</label>
                                    <input type="number" id="exampleInputFile" name="nationalID" class="form-control">
                                    @if($errors->has('nationalID')) <span
                                            style="color: red">{{ $errors->first('nationalID') }}</span> @endif
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
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection