<?php

use App\Question;
use App\Listen;
use App\Setting;

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
})->name('main');

Route::get('/testowe', function () {
    return view('test');
});

Auth::routes();
Route::get('/', 'memriseController@start');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'memriseController@show')->name('show');
Route::post('/answer', 'memriseController@answer')->name('answer');
Route::get('/create', 'memriseController@create')->name('create');
Route::get('/edit/{id}', 'memriseController@edit')->name('edit');
Route::get('listen/edit/{id}', 'ListenController@edit')->name('listenedit');
Route::patch('/edit/{id}', 'memriseController@update')->name('edit');
Route::patch('listen/edit/{id}', 'ListenController@update')->name('listenedit');

Route::get('/random', 'memriseController@random');
Route::post('/store', 'memriseController@store')->name('store');
Route::get('/test', function () {
    dd(Setting::find(1)->counterset);
});

Route::delete('/delete/{question}', function (Question $question) {
    $question->delete();

    return redirect()->back();
})->name('delete');
Route::delete('listen/delete/{question}', function (Listen $question) {
    $question->delete();

    return redirect()->back();
})->name('listendelete');
Route::get('/list', 'memriseController@list')->name('list');
Route::get('/listenlist', 'ListenController@list')->name('listenlist');

Route::get('/listzdania', 'memriseController@listzdania')->name('listzdania');
Route::patch('/setcounter', 'memriseController@setcounter')->name('setcounter');
Route::patch('/setcounterquestion/{id}', 'memriseController@setcounterquestion')->name('counterquestion');
Route::patch('/listen/setcounterquestion/{id}', 'ListenController@setcounterquestion')->name('listencounterquestion');

Route::patch('/mamracje/{id}', 'memriseController@mamracje')->name('mamracje');
Route::patch('/setlanguage', 'memriseController@setlanguage')->name('setlanguage');
Route::patch('/setsentences', 'memriseController@setsentences')->name('setsentences');
Route::get('/listen', 'memriseController@listen')->name('listen');
Route::get('/listen/show/{id}', 'ListenController@show')->name('listenshow');
Route::get('/listen/create', 'ListenController@create')->name('listencreate');
Route::post('/listenstore', 'ListenController@store')->name('listenstore');
Route::get('/listen/start', 'ListenController@start')->name('listenstart');
