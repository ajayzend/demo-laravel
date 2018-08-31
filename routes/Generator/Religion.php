<?php
/**
 * Religion
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Religion'], function () {
        Route::resource('religions', 'ReligionsController');
        //For Datatable
        Route::post('religions/get', 'ReligionsTableController')->name('religions.get');
    });
    
});