<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

if(config('app.env') === 'production'){
    
    URL::forceScheme('https');
}
Route::middleware('throttle:10,1')->group(function () {
    Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/events', [EventController::class, 'index']);
//Route::get('/calendars', [CalendarController::class, 'index']);

/* Route::get('/','UserController@getAuth');
Route::post('/','UserController@postAuth');

Route::get('/home', 'UserController@index');
Route::get('/logout','UserController@logout'); */


//++Attendance++//
Route::get('/time','TimeController@index');
//出退勤打刻
Route::post('/time/timein','TimeController@timein');
Route::post('/time/timeout','TimeController@timeout');
//休憩打刻
Route::post('/time/breakin','TimeController@breakin');
Route::post('/time/breakout','TimeController@breakout');
//勤怠実績
Route::get('/time/performance','TimeController@performance');
Route::post('/time/performance','TimeController@result');
//日次勤怠
Route::get('/time/daily','TimeController@daily');
Route::post('/time/daily','TimeController@dailyResult');


//レポート系

//Route::get('report/index', 'ReportController@index')->name('report.index');
Route::get('report/edit/{id}', 'ReportController@edit')->name('report.edit');
Route::post('report/update/{id}', 'ReportController@update')->name('report.update');


//検索
Route::post('search/by/month', 'ReportController@SearchByMonth')->name('search.by.month');

// 新検索
Route::get('show', 'SearchController@show')->name('show');
Route::get('searchproduct', 'SearchController@search')->name('searchproduct');



// 連絡掲示板
Route::get('/communication','CommunicationController@index');
Route::post('/communication','CommunicationController@create');

Route::get('/communication/edit','CommunicationController@edit');
Route::post('/communication/edit','CommunicationController@update');

Route::get('/communication/del','CommunicationController@delete');
Route::post('/communication/del','CommunicationController@remove');


//いいね機能
Route::get('/posts/{post?}/check', 'LikeController@check')->name('like.check');
Route::get('/posts/{post?}/firstcheck', 'LikeController@firstcheck')->name('like.firstcheck');
Route::resource('posts.likes', 'LikeController', [
     'only' => ['store'],

//いいねしているユーザーの表示
Route::get('/posts/{post?}/like','LikeController@like');

//アカウント作成
Route::get('account/index','AccountController@index')->name('account.index');
Route::get('account/create','AccountController@create')->name('account.create');
Route::post('account/store', 'AccountController@store')->name('user.store');
Route::get('account/edit/{id}', 'AccountController@edit')->name('account.edit');
Route::post('account/update/{id}', 'AccountController@update')->name('account.update');
Route::post('account/destroy/{id}', 'AccountController@destroy')->name('account.destroy');


