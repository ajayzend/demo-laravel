<?php
/**
 * Routes for : Visa Request
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Visa'], function () {
	    Route::get('visas', 'VisasController@index')->name('visas.index');
	    Route::get('visas/create', 'VisasController@create')->name('visas.create');
	    Route::post('visas', 'VisasController@store')->name('visas.store');
	    Route::get('visas/{visa}/edit', 'VisasController@edit')->name('visas.edit');
	    Route::patch('visas/{visa}', 'VisasController@update')->name('visas.update');
	    
	    //For Datatable
	    Route::post('visas/get', 'VisasTableController')->name('visas.get');
	});
	
});