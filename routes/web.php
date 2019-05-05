<?php

use App\Book;
use App\User;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('users', 'UserController');
    Route::get('/admin/chart', 'AdminController@chart')->name('admin.chart');


    Route::resource('admins', 'AdminController');
    Route::get('/api/get-lease-chart-data', 'ChartDataController@getMonthlyLeaseData');

// Not Finished yet

    Route::resource('books', 'BookController');
    Route::get('books/cat/{category}', 'BookController@category')->name('category');
    Route::post('books/{bookid}', 'BookController@addComment')->name('addComment');

    Route::get('/myfav', 'BookController@favourite')->name('favourite');
    Route::get('/myfav/cat/{category}', 'BookController@favcategory')->name('favcategory');
    Route::get('/latest', 'BookController@latest')->name('latest');
    Route::get('/fav/{id}', 'FavoriteController@store')->name('store');
    Route::get('/del/{id}', 'FavoriteController@destroy')->name('deletefav');

    Route::post('/lease', 'LeaseController@store')->name('lease');
    Route::get('/leasedel/{id}', 'LeaseController@destroy')->name('cancelLease');
});

//search
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $books = Book::where('title','LIKE','%'.$q.'%')->get();
    if(count($books) > 0)
        return view('search')->withDetails($books)->withQuery ( $q );
    else
        return view ('search')->withMessage('No Details found. Try to search again !');
});
// Route::group(['prefix' => 'AdminPanel', 'middleware' => 'auth'], function (){
//     Route::get('/admin/manager' , 'Admin\ManagerController@index')->name('manager');
//     Route::post('/admin/manager/save' , 'Admin\ManagerController@save')->name('saveManager');
//     Route::post('/admin/manager/update/{id}' , 'Admin\ManagerController@update')->name('updateManager');
//     Route::post('/admin/manager/delete/{id}' , 'Admin\ManagerController@destroy')->name('deleteManager');
// });
