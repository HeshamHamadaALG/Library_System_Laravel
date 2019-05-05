<!-- create.blade.php -->

@extends('layouts.dash')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Book
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
    <form action="{{ route('books.store') }}" method="post" role="form" enctype="multipart/form-data">    
          @csrf
          <div class="form-group">
              <label for="title"> Name :</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="author">Author :</label>
              <input type="text" class="form-control" name="author"/>
          </div>
          <div class="form-group">
              <label for="image">Image :</label>
              <input type="file" class="form-control" name="image"/>
                      </div>
          <div class="form-group">
              <label for="category">Category :</label>
              <!-- <input type="" class="form-control" name="category"/> -->
              <select name="cat_id">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">
                        {{$category->name}}
                      </option>
                    @endforeach
                  </select>
           </div>
          <div class="form-group">
              <label for="feesPerDay">Fees :</label>
              <input type="number" class="form-control" name="feesPerDay"/>
          </div>
          <div class="form-group">
              <label for="numberOfCopies">No.of copies :</label>
              <input type="number" class="form-control" name="numberOfCopies"/>
          </div>
          <button type="submit" class="btn btn-primary">Create Book</button>
      </form>
  </div>
</div>
@endsection