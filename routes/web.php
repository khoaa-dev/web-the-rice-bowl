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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/offer-detail/{id}', 'PackageController@offerDetail');

Route::get('/service', 'ServiceController@index');
Route::get('/service/{id}', 'ServiceController@show');
Route::get('/about', function () {
    return view('about');
});
Route::get('/menu', 'MenuController@index');


Route::resource('/order', 'OrderController');

Route::post('/order-create', 'OrderController@createOrder')->name('createOrder');

Route::post('/updateStatus/{id}', 'OrderController@updateStatus')->name('updateStatus');

Route::get('/cart/{id}', 'OrderController@getCart')->name('getOrder');


Route::post('/search', 'FoodController@getSearchAjax')->name('search');

Route::post('/add-food', 'FoodController@addFood')->name('addFood');

Route::post('/remove-food', 'FoodController@removeFood')->name('removeFood');

Route::post('/init-session', 'FoodController@initSession')->name('initSession');

Route::get('/update-menu', 'FoodController@updateMenu')->name('updateMenu');

Route::get('/login-form', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
