<?php

/*
 * Faqs Management
 */



Route::group(['namespace' => 'Visa'], function () {
    Route::get('/visaamendprocess/', 'VisasController@getvisaamendprocess')->name('visaamendprocess');
    Route::post('/visaamendprocess', 'VisasController@setvisaamendprocess')->name('visaamendprocess');
    Route::resource('visas', 'VisasController', ['except' => ['show']]);

    //For DataTables
    Route::post('visas/get', 'VisasTableController')->name('visas.get');

    /*
* Show pages
*/
    Route::get('visas/{slug}', 'VisasController@showVisa')->name('visas.show');


    // Status
    //Route::get('faqs/{faq}/mark/{status}', 'FaqStatusController@store')->name('faqs.mark')->where(['status' => '[0,1]']);
});
