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
    Route::resource('admin', 'AdminController');
    Route::get('/api/get-lease-chart-data', 'ChartDataController@getMonthlyLeaseData');

// Not Finished yet
    Route::get('books', function () {
        return View::make('books');
    });
    Route::get('books/{category}', 'BookController@category')->name('category');
    Route::get('bookid/{bookid}', 'BookIdController@bookid')->name('bookid');
    Route::get('/fav/{id}', 'FavoriteController@store')->name('store');
    Route::get('/del/{id}', 'FavoriteController@destroy')->name('deletefav');
});

Route::resource('books', 'BookController');
Route::resource('admins' , 'AdminController');
// Route::group(['prefix' => 'AdminPanel', 'middleware' => 'auth'], function (){
//     Route::get('/admin/manager' , 'AdminController@index')->name('manager');
//     Route::post('/admin/manager/save' , 'AdminController@save')->name('saveManager');
//     Route::post('/admin/manager/update/{id}' , 'AdminController@update')->name('updateManager');
//     Route::post('/admin/manager/delete/{id}' , 'AdminController@destroy')->name('deleteManager');
// });

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
