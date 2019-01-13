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

// as guest
Route::group(['middleware' => ['guest']], function () {
    Route::get('/member/login', 'Auth\LoginController@login_member')->name('member_login');
    Route::post('/member/login', 'Auth\LoginController@authenticate_member')->name('post_member_login');
    Route::post('/login', 'Auth\LoginController@authenticate_admin')->name('post_admin_login');
});

// as member
Route::group(['middleware' => ['auth']], function () {
  Route::group(['middleware' => ['not_vote']], function () {
    // Route::get('/', 'VoteController@index')->name('vote');
    // Route::post('/', 'VoteController@create')->name('create_vote');
    Route::get('/', 'MynaController@index')->name('upload_photo');
    Route::post('/', 'MynaController@upload')->name('post_upload_photo');
    Route::get('confirmation', 'MynaController@confirmation')->name('upload_confirmation');
    Route::post('confirmation', 'MynaController@store')->name('store_upload');
    Route::get('thankyou', 'MynaController@thankyou')->name('thankyou');
  });
});

Route::prefix('admin')->group(function () {
  Auth::routes();
  Route::group(['middleware' => ['auth_admin']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/download', 'HomeController@download')->name('download_result');
    Route::post('/import', 'HomeController@import')->name('import_member');
    Route::get('/result', 'VoteController@result')->name('result');
    Route::post('/reset-vote', 'HomeController@reset_vote')->name('reset_vote');
    Route::post('/reset-member', 'HomeController@reset_member')->name('reset_member');
  });
});
