<?php

Route::prefix('admin')->group(function () {
    Route::get('/', 'LoginController@Admin')->name('admin');
    Route::post('/logout','LoginController@Logout');
    Route::get('/login', 'LoginController@Login');
    Route::post('/check-login', 'LoginController@Auth');
    Route::post('/refresh', 'LoginController@Refresh');
});
