@extends('layouts.app')

@section('content')

    <div class="container">
        @if(isset($details))
            <h2> The Search results for your query <b> {{ $query }} </b> are :</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Fees</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $books)
                <tr>
                    <td>
                        <a href="{{ route('bookid', $books->id) }}">
                            <img src="{{$books->image}}" width="100" height="100"/>
                        </a>
                    </td>
                    <td>{{$books->title}}</td>
                    <td>{{$books->description}}</td>
                    <td>{{$books->feesPerDay}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h2>No Details found. Try to search again !</h2>
        @endif
    </div>
@endsection