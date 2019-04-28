@extends('layouts.app')

@section('content')
<div class="container">

    <!-- search bar  -->

    <div class="container">
        <div class="row">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <div class="d-inline-flex orderPos">
                <h3 style="padding-right: 10px;"> Order By </h3>
                <div class="btn-group pull-right" data-toggle="buttons-radio">
                    <button class="btn btn-outline-primary">Rate</button>
                    <button class="btn btn-outline-info">Latest</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end of search bar -->

    <hr>

    <div class="row">
        <!-- Side Bar for Categories -->
        <div class="col-md-3 left">

            <li class="list-group-item">
                <a href="#collapseA" data-toggle="collapse">
                    <span>Categories</span>
                </a>
            </li>
            <ul class="list-group" id="collapseA">
                <li class="list-group-item lhover"></i> <span>Comedy</span></li>
                <li class="list-group-item lhover"></i> <span>Horror</span></li>
                <li class="list-group-item lhover"></i> <span>Drama</span></li>
                <li class="list-group-item lhover"></i> <span>Comedy</span></li>
                <li class="list-group-item lhover"></i> <span>Horror</span></li>
                <li class="list-group-item lhover"></i> <span>Drama</span></li>
                <li class="list-group-item lhover"></i> <span>Comedy</span></li>
                <li class="list-group-item lhover"></i> <span>Horror</span></li>
                <li class="list-group-item lhover"></i> <span>Drama</span></li>
            </ul>
        </div>
        <!-- end of Categories side bar  -->



        <!-- book Card -->

        <div class="col-lg-3 col-md-6 mb-3">
            <!-- Card Narrower -->
            <div class="card card-cascade narrower">
                <!-- Title -->
                <div class="card-header d-inline-flex">
                    <h4 class="font-weight-bold">Life Of Pi</h4>
                    <span style="margin-left: auto;"><i class="fa fa-heart fav"></i></span>
                </div>
                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="imgg card-img-top" src="https://images.gr-assets.com/books/1320562005l/4214.jpg" alt="Card image cap">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                    <!-- Data -->
                    <ul class="list-unstyled list-inline rating mb-0">
                        <li class="list-inline-item"><i class="fa fa-star rateStr"> </i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item">
                            <p class="text-muted">4.5 (413)</p>
                        </li>
                    </ul>
                    <!-- Text -->
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
                    <!-- Avilability -->
                    <p class="aval"> <span> 2 </span> Books Available </p>
                    <!-- Button -->
                    <a class="btnLease">Lease</a>

                </div>

            </div>
            <!-- Card Narrower -->
        </div>


        <!-- static copies for the card just to test -->

        <div class="col-lg-3 col-md-6 mb-3">
            <!-- Card Narrower -->
            <div class="card card-cascade narrower">
                <!-- Title -->
                <div class="card-header d-inline-flex">
                    <h4 class="font-weight-bold">Life Of Pi</h4>
                    <span style="margin-left: auto;"><i class="fa fa-heart fav"></i></span>
                </div>
                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="imgg card-img-top" src="https://images.gr-assets.com/books/1320562005l/4214.jpg" alt="Card image cap">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                    <!-- Data -->
                    <ul class="list-unstyled list-inline rating mb-0">
                        <li class="list-inline-item"><i class="fa fa-star rateStr"> </i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item">
                            <p class="text-muted">4.5 (413)</p>
                        </li>
                    </ul>
                    <!-- Text -->
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
                    <!-- Avilability -->
                    <p class="aval"> <span> 2 </span> Books Available </p>
                    <!-- Button -->
                    <a class="btnLease">Lease</a>

                </div>

            </div>
            <!-- Card Narrower -->
        </div>


        <div class="col-lg-3 col-md-6 mb-3">
            <!-- Card Narrower -->
            <div class="card card-cascade narrower">
                <!-- Title -->
                <div class="card-header d-inline-flex">
                    <h4 class="font-weight-bold">Life Of Pi</h4>
                    <span style="margin-left: auto;"><i class="fa fa-heart fav"></i></span>
                </div>
                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="imgg card-img-top" src="https://images.gr-assets.com/books/1320562005l/4214.jpg" alt="Card image cap">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                    <!-- Data -->
                    <ul class="list-unstyled list-inline rating mb-0">
                        <li class="list-inline-item"><i class="fa fa-star rateStr"> </i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star rateStr"></i></li>
                        <li class="list-inline-item">
                            <p class="text-muted">4.5 (413)</p>
                        </li>
                    </ul>
                    <!-- Text -->
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
                    <!-- Avilability -->
                    <p class="aval"> <span> 2 </span> Books Available </p>
                    <!-- Button -->
                    <a class="btnLease">Lease</a>

                </div>

            </div>
            <!-- Card Narrower -->
        </div>

        <!-- end of copies  -->

    </div>

    <!-- start pagination -->
    <hr>

    <div class="container">
        <div class="row justify-content-center">
            <ul class="pagination pagination-lg">
                <li><a href="#">
                        <<</a> </li> <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div>
    </div>

    <!-- End Pagination -->
</div>
@endsection