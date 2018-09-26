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

Route::get('home-page', function () {
    return view('home_page');
});

Route::get('/search-job', function () {
    return view('search_job');
});

Route::get('/job-detail', function () {
    return view('job_detail');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tickets', 'TicketController@index');
Route::get('/create/ticket','TicketController@create');
Route::post('/create/ticket','TicketController@store');

Route::get('/edit/ticket/{id}','TicketController@edit');
Route::post('/edit/ticket/{id}','TicketController@update');

Route::delete('/delete/ticket/{id}','TicketController@destroy');