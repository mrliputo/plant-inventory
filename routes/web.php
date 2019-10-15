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

// Page routes
Route::get('/', 'PagesController@index')->name('home');
Route::get('message', 'PagesController@message');

// QRCode generator
Route::get('tree/{tree}/qrcode', 'TreeController@generateQrcode')->name('generateQrcode');
Route::get('tree/{tree}/tag-dl', 'TreeController@downloadNameTag')->name('downloadNameTag');

// Account settings
Route::get('settings','Auth\AccountController@showForm')->name('settings');
Route::post('settings/change_password', 'Auth\AccountController@changePassword')->name('changePassword');

// Free search (on top navbar)
Route::get('search', 'SearchController@search')->name('search');

// Search routes on admin page
Route::get('tree/search', 'SearchController@speciesSearch');
Route::get('messages/search', 'SearchController@messageSearch');

// Location routes
Route::get('location/search', 'SearchController@searchLocation')->name('showLocationSearchPage');
Route::get('location/get_ajax', 'SearchController@returnAjaxData');
Route::get('location/search/find', 'SearchController@returnNonAjaxData');
Route::get('location/species/{name}', 'SearchController@getItemLocation')->name('showLocation');


// Search by letter for mobile users
Route::get('sort', 'SearchController@sort');

// Search by group in alphabetical order
Route::get('species/{letter}/all', 'SearchController@allList')->name('species.all');
Route::get('species/{letter}/common', 'SearchController@commonList')->name('species.common');
Route::get('species/{letter}/botanical', 'SearchController@botanicalList')->name('species.botanical');
Route::get('species/family', 'SearchController@familyList')->name('species.family');
Route::get('species/family/{family_name}', 'SearchController@familyResult')->name('species.family.result');

// Drop all rows from the table message
Route::delete('messages/drop', 'MessagesController@dropAll')->name('messages.drop');

// Resource routes
Route::resource('species', 'SpeciesController');
Route::resource('tree', 'TreeController');
Route::resource('messages', 'MessagesController');

// Article routes
Route::get('read/pemanfaatan-qrcode', 'PagesController@showQrcodePage')->name('read.qrcode');

Auth::routes();
