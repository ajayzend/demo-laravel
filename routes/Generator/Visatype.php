<?php
/**
 * Visa Type
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Visatype'], function () {
        Route::resource('visatypes', 'VisatypesController');
        //For Datatable
        Route::post('visatypes/get', 'VisatypesTableController')->name('visatypes.get');
    });
    
});