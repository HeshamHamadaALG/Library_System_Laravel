@extends('layouts.dash')
@section('content')
    <div class="content-wrapper" style="margin-left: 50px;">
        <section class="content-header">
            <h1>
                Manager
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manager</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="margin: 37px 0; text-align: center">Manager</h3>
                        </div>
                        <form role="form" action="{{ route('saveManager') }}">
                            @csrf
                            @method('POST')
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
                                    <label for="exampleInputFile">Confirm Password</label>
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
                                    <label for="exampleInputFile">NationalID:</label>
                                    <input type="number" id="exampleInputFile" name="nationalID" class="form-control">
                                    @if($errors->has('nationalID')) <span
                                            style="color: red">{{ $errors->first('nationalID') }}</span> @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary " value="add">
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($rows as $row)
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <form role="form" action="{{ route('updateManager', $row->id) }}">
                                  @csrf
                                  @method('PATCH')
                                <div class="box-body">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="exampleInputFile">Username:</label>
                                        <input type="text" id="exampleInputFile" name="name" class="form-control">
                                        @if($errors->has('name')) <span style="color: red">{{ $errors->first('name') }}</span> @endif
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="exampleInputFile">Email:</label>
                                        <input type="email" id="exampleInputFile" name="email" value="{{ $row->email }}"
                                               class="form-control">
                                        @if($errors->has('email')) <span
                                                style="color: red">{{ $errors->first('email') }}</span> @endif
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label for="exampleInputFile">En_Caption</label>
                                        <input type="number" id="exampleInputFile" name="phone" value="{{ $row->phone }}"
                                               class="form-control">
                                        @if($errors->has('phone')) <span
                                                style="color: red">{{ $errors->first('phone') }}</span> @endif
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group {{ $errors->has('nationalID') ? 'has-error' : '' }}">
                                        <label for="exampleInputFile">National ID:</label>
                                        <input type="number" id="exampleInputFile" name="nationalID" value="{{ $row->nationalID }}"
                                               class="form-control">
                                        @if($errors->has('nationalID')) <span
                                                style="color: red">{{ $errors->first('nationalID') }}</span> @endif
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary col-md-3" value="update">
                                </div>
                            </form>
                            <form action="{{ route('deleteManager', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="box-footer">
                                    <button type="button" class="btn btn-danger col-md-3" data-toggle="modal"
                                            data-target="#myModal">
                                        delete
                                    </button>
                                </div>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">are you sure ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-danger" value="delete">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection