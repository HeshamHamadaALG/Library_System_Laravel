<?php


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
    // Route::get('/admin', 'AdminController');
    Route::get('/api/get-lease-chart-data', 'ChartDataController@getMonthlyLeaseData');

// Not Finished yet
    Route::get('books', function () {
        return View::make('books');
    });
    Route::get('bookid', function () {
        return View::make('bookid');
    });
});
Route::resource('books', 'BookController');


// Route::group(['prefix' => 'AdminPanel', 'middleware' => 'auth'], function (){
//     Route::get('/admin/manager' , 'Admin\ManagerController@index')->name('manager');
//     Route::post('/admin/manager/save' , 'Admin\ManagerController@save')->name('saveManager');
//     Route::post('/admin/manager/update/{id}' , 'Admin\ManagerController@update')->name('updateManager');
//     Route::post('/admin/manager/delete/{id}' , 'Admin\ManagerController@destroy')->name('deleteManager');
// });


