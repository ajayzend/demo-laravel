<?php
/**
 * Education
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Education'], function () {
        Route::resource('education', 'EducationController');
        //For Datatable
        Route::post('education/get', 'EducationTableController')->name('education.get');
    });
    
});