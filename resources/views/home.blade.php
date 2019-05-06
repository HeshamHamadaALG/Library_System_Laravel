@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="welcome">
            <h1>Welcome To MKtabty</h1>
            <button type="button" class="btn btn-primary butn" onclick="window.location=`{{ url('/books') }}`"><h3> Go To Library</h3></button>
        </div>

    </div>
</div>
</div>
@endsection