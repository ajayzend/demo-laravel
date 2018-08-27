<?php
/**
 * Port Of Arrival
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Port'], function () {
        Route::resource('ports', 'PortsController');
        //For Datatable
        Route::post('ports/get', 'PortsTableController')->name('ports.get');
    });
    
});