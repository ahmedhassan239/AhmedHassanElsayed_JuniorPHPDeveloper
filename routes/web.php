<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'root', 'middleware' => ['auth'], 'namespace' => 'Admin'], function() {
	//admin panel home
	 Route::get('adminhome', 'AdminController@index');
	//clients
      Route::resource('/client','ClientsController');
	    Route::post('/client/store','ClientsController@store');
      Route::post('/client/update/', 'ClientsController@update')->name('update');
      Route::get('/client/{id}/delete/', 'ClientsController@destroy')->name('delete');
	    Route::post('clients/data','ClientsController@anyData');
      Route::get('/clients/{id}/show','ClientsController@showClientData');
    //Services
      Route::post('/service/add','ServicesController@store');
      Route::get('/service/{id}/edit','ServicesController@edit');
      Route::get('/service/show','ServicesController@index');
      Route::post('service/data','ServicesController@anyData');
      Route::get('/service/{id}/delete/', 'ServicesController@destroy')->name('delete');
      Route::post('/service/update', 'ServicesController@update')->name('update');
});



