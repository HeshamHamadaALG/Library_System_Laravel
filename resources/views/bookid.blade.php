@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!--  -->
        <!--  -->


        <div class="main col-md-10">
            @foreach ($books as $book)
            <div class="bookCard d-inline-flex"><img class="image cover" src="{{$book->image}}" />
                <div class="book-info">
                    <span style="float: right; font-size: 180%"><i class="fa fa-heart fav"></i></span>
                    <h3 class="font-weight-bold">{{$book->title}}</h3>
                    <!-- Author -->
                    <p class="card-text">By : {{$book->author}}</p>
                    <!-- Data -->
                    <ul class="list-unstyled list-inline rating mb-0">
                        <li class="list-inline-item"><i class="fa fa-star rateStr"> </i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item">
                            @foreach ($rates as $rate)
                            @if ($rate->book_id == $book->id)
                            <p class="text-muted">{{$rate->rate}}</p>
                            @endif
                            @endforeach
                        </li>
                    </ul>
                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <!-- Text -->
                        <p class="card-text">{{$book->description}}</p>
                        <!-- Avilability -->
                        <p class="aval"> <span> {{$book->numberOfCopies}} </span> Books Available </p>
                        <!-- Button -->
                        <a class="btnLease col-md-3">Lease</a>


                    </div>
                </div>
            </div>

            <hr>

            <!-- add comment -->

            <div class="form-group shadow-textarea d-flex">
                <textarea class="form-control z-depth-1 col-md-9" rows="2" placeholder="Write comment here..."></textarea>
                <button class="btn btn-info col-md-3 "> Add Comment ..</button>
            </div>

            <!-- end of add comment -->

            <hr>

            <!-- show comments -->

            <div class="col-sm-12" style="margin: 2%;">
                <div class="card card-cascade">
                    <div class="card-header">
                        <strong>UserName</strong> <span class="text-muted">12/04/2019 01:25 AM</span>
                    </div>
                    <div class="card-body card-body-cascade">
                        Panel content
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card card-cascade" style="margin: 2%;">
                    <div class="card-header">
                        <strong>UserName</strong> <span class="text-muted">12/04/2019 01:25 AM</span>
                    </div>
                    <div class="card-body card-body-cascade">
                        Panel content
                    </div>
                </div>
            </div>
            <!-- End  show comments -->

            <hr>

            <h2> Related Books</h2>

            <div id="ThumbnailCarousel" class="carousel slide col-xs-12" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row center-block">
                            <div class="col-md-3 col-sm-6 margg">
                                <div class="card card-cascade narrower">
                                    <!-- Title -->
                                    <div class="card-header d-inline-flex">
                                        <h4 class="font-weight-bold">{{$book->title}}</h4>
                                    </div>
                                    <!-- Card image -->
                                    <div class="view view-cascade overlay">
                                        <img class="imgg card-img-top" src="{{$book->image}}" alt="Card image cap">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($related as $relate)
                    @if ($relate->cat_id == $book->cat_id)
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 margg">
                                <div class="card card-cascade narrower">
                                    <!-- Title -->
                                    <div class="card-header d-inline-flex">
                                        <h4 class="font-weight-bold">{{$relate->title}}</h4>
                                    </div>
                                    <!-- Card image -->
                                    <div class="view view-cascade overlay">
                                        <a href="{{ route('bookid', $relate->id) }}">
                                        <img class="imgg card-img-top" src="{{$relate->image}}" alt="Card image cap">
                                        </a>
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                        @endif
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#ThumbnailCarousel" role="button" data-slide="prev">
                    <button class="btn btn-dark">prev</button>
                </a>
                <a class="carousel-control-next" href="#ThumbnailCarousel" role="button" data-slide="next">
                    <button class="btn btn-dark">next</button>

                </a>
            </div>




        </div>
        @endforeach
    </div>
    @endsection