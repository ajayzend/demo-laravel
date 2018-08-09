<?php

/*
 * Faqs Management
 */
Route::group(['namespace' => 'Visa'], function () {
    Route::resource('visas', 'VisasController', ['except' => ['show']]);

    //For DataTables
    Route::post('visas/get', 'VisasTableController')->name('visas.get');

    // Status
    //Route::get('faqs/{faq}/mark/{status}', 'FaqStatusController@store')->name('faqs.mark')->where(['status' => '[0,1]']);
});
