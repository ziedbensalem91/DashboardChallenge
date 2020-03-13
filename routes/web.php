<?php

use Illuminate\Support\Facades\Route;

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
// Route::group(['middelware' => ['auth']], function () {
//     Route::get('/user', 'DemoController@userDemo')->name('user');
//     Route::get('/permission-denied', 'DemoController@permissionDenied')->name('admin');
//     Route::group(['middelware' => ['admin']], function () {
// Route::get('/admin', 'DemoController@adminDemo')->name('admin');
// });
// });
Route::get('/home', 'HomeController@index')->name('home')->middleware('is_admin');
Route::view('/adminHome', 'adminHome')->name('adminHome');
//Route::get('/challanges', 'ChallangeController@index')->name('challange.index');
Route::resource('challanges', 'ChallangeController');

