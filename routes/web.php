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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
---------------------------------------------------------------------------
Penjelasan kode dibawah
---------------------------------------------------------------------------
Kode ini digunakan untuk mengarahkan kembali ke hamalan login jika halaman register di akses,
Route::match (get, post) '/register' berarti jika routing yang di akses mengandung kata register dan menggunakan method get,
dan post, maka function ini akan mengarahkan ke halaman login dengan return redirect("/login"). 
*/
Route::match(['get', 'post'], '/register', function () {
    return redirect("/login");
})->name("register");

/*
Kode dibawah ini berguna untuk apabila app di akses (localhost/larashop/) maka app tidak lagi mengarahkan ke app home laravel
tapi langsung meredirect ke halaman login
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');

Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::resource('/categories', 'CategoryController');