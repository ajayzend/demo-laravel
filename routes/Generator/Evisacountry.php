<?php
/**
 * E-Visa Country
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Evisacountry'], function () {
        Route::resource('evisacountries', 'EvisacountriesController');
        //For Datatable
        Route::post('evisacountries/get', 'EvisacountriesTableController')->name('evisacountries.get');
    });
    
});