<?php
/**
 * Routes for : Contact-Us
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Contactus'], function () {
	    Route::get('contactuses', 'ContactusesController@index')->name('contactuses.index');
	    Route::get('contactuses/create', 'ContactusesController@create')->name('contactuses.create');
	    Route::post('contactuses', 'ContactusesController@store')->name('contactuses.store');
	    Route::get('contactuses/{contactus}/edit', 'ContactusesController@edit')->name('contactuses.edit');
	    Route::patch('contactuses/{contactus}', 'ContactusesController@update')->name('contactuses.update');
	    
	    //For Datatable
	    Route::post('contactuses/get', 'ContactusesTableController')->name('contactuses.get');
	});
	
});