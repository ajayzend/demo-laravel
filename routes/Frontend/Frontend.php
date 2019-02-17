<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/privacy-policy', 'FrontendController@privacy')->name('privacy');
Route::get('/document', 'FrontendController@document')->name('document');
Route::get('/instruction', 'FrontendController@instruction')->name('instruction');
Route::get('/condition', 'FrontendController@condition')->name('condition');
Route::get('/about-us', 'FrontendController@about')->name('about');
Route::get('/disclaimer', 'FrontendController@disclaimer')->name('disclaimer');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/evp/process1', 'VisasProcessController@visaProcess1')->name('evp.process1');
//Route::get('/evp/processget1/{slug}/edit', 'VisasProcessController@edit')->name('evp.processget1');


Route::get('/evp/process2', 'FrontendController@visaProcess2')->name('visaProcess2');


Route::get('/evp/visaamendprocess/', 'FrontendController@visaAmendment')->name('amendprocess');

Route::post('/visaprocess1', 'VisasProcessController@storeVisaProcess1')->name('visaprocess1');
Route::post('/visaprocessupdate/{slug}', 'VisasProcessController@update')->name('visaprocessupdate');
Route::post('/visaprocess2', 'VisasProcessController@storeVisaProcess2')->name('visaprocess2');
//Route::post('/visaamendprocess', 'VisasProcessController@visaAmendmentProcess')->name('visaamendprocess');

Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
