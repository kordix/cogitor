<?php

use App\Question;
use App\Listen;
use App\Setting;
use App\Category;
use App\Traits\ExampleCode;

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


Route::get('/escape', function () {
    return view('home');
})->name('main');

Route::get('/testt', function () {
    App\Traits\ExampleCode::printThis();
})->name('main');


// Route::get('/api/show/{id}', 'apicontroller@showapi')->name('showapi');

Auth::routes();
Route::get('/createcategory', 'categoryController@createcategory')->name('createcategory');
Route::get('/categories', 'categoryController@listcategories')->name('listc');
Route::post('/storecategory', 'categoryController@storecategory')->name('storecategory');

Route::get('/', 'memriseController@start')->name('start');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'memriseController@show')->name('show');
Route::post('/answer', 'memriseController@answer')->name('answer');
Route::get('/create', 'memriseController@create')->name('create');
Route::get('/edit/{id}', 'memriseController@edit')->name('edit');
Route::get('listen/edit/{id}', 'ListenController@edit')->name('listenedit');
Route::get('category/edit/{id}', 'memriseController@editc')->name('editc');

Route::patch('/edit/{id}', 'memriseController@update')->name('edit');
Route::patch('listen/edit/{id}', 'ListenController@update')->name('listenedit');
Route::patch('category/edit/{id}', 'categoryController@updatec')->name('updatec');

Route::get('/random', 'memriseController@random');
Route::post('/store', 'memriseController@store')->name('store');
Route::get('/test', function () {
    dd(Setting::find(1)->counterset);
});

Route::delete('/delete/{question}', 'memriseController@delete')->name('delete');

Route::delete('/deletec/{category}', function (Category $category) {
    $this->middleware('auth');
    $category->delete();
    session()->flash('message', 'usunięto kategorię');
    return redirect()->back();
})->name('deletec');

Route::delete('/listen/delete/{id}', 'ListenController@destroy')->name('listendelete');
Route::get('/list', 'memriseController@list')->name('list');
Route::get('/list/{param}', 'memriseController@list')->name('list');
Route::get('/listcat/{param}', 'memriseController@listcat')->name('listcat');
Route::get('/listtag/{param}', 'memriseController@listtag')->name('listtag');


Route::get('/listenlist', 'ListenController@list')->name('listenlist');

Route::get('/listzdania', 'memriseController@listzdania')->name('listzdania');
Route::get('/listzdania/{param}', 'memriseController@listzdania')->name('listzdania');
Route::patch('/setcounter', 'SettingController@setcounter')->name('setcounter');
Route::patch('/setcounterquestion/{id}', 'SettingController@setcounterquestion')->name('counterquestion');
Route::patch('/setanswerset', 'SettingController@setanswerset')->name('answerset');
Route::get('/indexsettings', 'SettingController@index')->name('indexsettings');

Route::patch('/updatesettings', 'SettingController@update')->name('updatesettings');


Route::patch('/listen/setcounterquestion/{id}', 'ListenController@setcounterquestion')->name('listencounterquestion');

Route::patch('/mamracje/{id}', 'memriseController@mamracje')->name('mamracje');
Route::patch('/setlanguage', 'SettingController@setlanguage')->name('setlanguage');
Route::patch('/setsentences', 'SettingController@setsentences')->name('setsentences');
Route::patch('/setcategory', 'SettingController@setcategory')->name('setcategory');

Route::get('/listen', 'memriseController@listen')->name('listen');
Route::get('/listen/show/{id}', 'ListenController@show')->name('listenshow');
Route::get('/listen/create', 'ListenController@create')->name('listencreate');
Route::post('/listenstore', 'ListenController@store')->name('listenstore');
Route::get('/listen/start', 'ListenController@start')->name('listenstart');

Route::resource('tags', 'TagController');
Route::resource('tagpivot', 'TagpivotController');
