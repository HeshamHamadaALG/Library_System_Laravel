<!-- index.blade.php -->

@extends('layouts.dash')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Description</td>
          <td>Author</td>
          <td>Category</td>
          <td>Image</td>
          <td>Fees</td>
          <td>No.of copies</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->category->name}}</td>
            <td><img src="{{ asset($book->image) }}" height="80" width="100"/></td>
            <td>{{$book->feesPerDay}}</td>
            <td>{{$book->numberOfCopies}}</td>
            <td><a href="{{ route('adminbooks.edit',$book->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('adminbooks.destroy', $book->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection