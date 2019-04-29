@extends('layouts.app')

@section('content')

    <div class="container">
        @if(isset($details))
            <h2> The Search results for your query <b> {{ $query }} </b> are :</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $books)
                <tr>
                    <td>{{$books->title}}</td>
                    <td>{{$books->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h2>No Details found. Try to search again !</h2>
        @endif
    </div>
@endsection