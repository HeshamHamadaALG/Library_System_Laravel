<!-- edit.blade.php -->

@extends('layouts.dash')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('books.update', $book->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="title" value="{{$book->title}}"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description" value="{{$book->description}}"/>
          </div>
          <div class="form-group">
              <label for="author">Author :</label>
              <input type="text" class="form-control" name="author" value="{{$book->author}}"/>
          </div>
          <div class="form-group">
              <label for="image">Image :</label>
              <input type="text" class="form-control" name="image" value="{{$book->image}}"/>
          </div>
          <div class="form-group">
              <label for="feesPerDay">Fees :</label>
              <input type="number" class="form-control" name="feesPerDay" value="{{$book->feesPerDay}}"/>
          </div>
          <div class="form-group">
              <label for="numberOfCopies">No.of copies :</label>
              <input type="number" class="form-control" name="numberOfCopies" value="{{$book->numberOfCopies}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Book</button>
      </form>
  </div>
</div>
@endsection