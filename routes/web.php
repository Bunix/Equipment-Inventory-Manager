<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'ModelController@index');

Route::get('/equipment_list/{ID}', 'ModelController@equipment_list');

//Route::get('/equipment_model/{ID}', 'ModelController@show');

Route::get('/equipment_item/{ID}', 'ModelController@equipment_item');

Route::get('/new', 'ModelController@new_selector_page');

Route::get('/new/{ID}', 'ModelController@new_item')->name('new_item');

Route::get('/new-model', 'ModelController@new_model');

Route::get('/search', 'ModelController@search');

Route::post('/search/results/', 'ModelController@search_results');

Route::get('/about', 'PagesController@about');

Route::post('/new/model/{model}/item', 'ModelController@addItem');

Route::post('/new_model/add_model', 'ModelController@addModel');

Route::patch('/equipment_item/update/{model}/{item}', 'ModelController@update');

Route::delete('/equipment_item/update/{model}/{item}', 'ModelController@deleteItem');

Route::patch('/update/{model}/{item}', 'ModelController@update');

Route::delete('/update/{model}/{item}', 'ModelController@deleteItem');


Route::get('/home', 'HomeController@index');


Route::get('/profile', 'ModelController@editProfile');

Route::patch('/profile/update/', 'ModelController@updateProfile');

Route::get('/admin/app', 'ModelController@adminPanel');

Route::get('/admin/lab', 'ModelController@labOwnerPanel');

Route::get('/admin/adminLab', 'ModelController@adminLabOwnerPanel');

Route::get('/admin/newLab', 'ModelController@newLabPanel');

Route::post('/admin/newLab/addLab', 'ModelController@addNewLab');

Route::get('/admin/editUsers', 'ModelController@editUserPanel');

Route::patch('/admin/editUsers/{user}/update', 'ModelController@updateUser');

Route::delete('/admin/editUsers/{user}/update', 'ModelController@deleteUser');

Route::get('/admin/verifiedList', 'ModelController@verifiedList');



Route::patch('/admin/lab/update/info/{lab}', 'ModelController@updateLab');

Route::delete('/admin/lab/update/info/{lab}', 'ModelController@deleteLab');

Route::patch('/admin/lab/update/mark/{lab}', 'ModelController@markLab');

Route::get('/admin/lab/update/transfer/{lab}', 'ModelController@labTransferPanel');

Route::patch('/admin/lab/update/transfer/{lab}/go', 'ModelController@transferLab');

Route::get('/password/reset', 'ModelController@passwordResetForm');

Route::patch('/password/reset', 'ModelController@resetPassword');