<?php

use App\Question;
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
Route::patch('/edit/{id}', 'memriseController@update')->name('edit');
Route::get('/random', 'memriseController@random');
Route::post('/store', 'memriseController@store')->name('store');
Route::get('/test', function () {
    dd(Setting::find(1)->counterset);
});

Route::delete('/delete/{question}', function (Question $question) {
    $question->delete();

    //return back();
})->name('delete');
Route::get('/list', 'memriseController@list')->name('list');
Route::get('/listzdania', 'memriseController@listzdania')->name('listzdania');
Route::patch('/setcounter', 'memriseController@setcounter')->name('setcounter');
Route::patch('/setcounterquestion/{id}', 'memriseController@setcounterquestion')->name('counterquestion');
Route::patch('/mamracje/{id}', 'memriseController@mamracje')->name('mamracje');
Route::patch('/setlanguage', 'memriseController@setlanguage')->name('setlanguage');
