<?php
/**
 * Occupation
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Occupation'], function () {
        Route::resource('occupations', 'OccupationsController');
        //For Datatable
        Route::post('occupations/get', 'OccupationsTableController')->name('occupations.get');
    });
    
});