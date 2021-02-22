<?php

Route::group(['middleware' => 'logout'], function () {
    Route::get('/dang-nhap', 'AuthController@Login')->name('login');
    Route::post('/auth', 'AuthController@Auth')->name('auth');
    Route::get('/dang-ky', 'AuthController@Register')->name('register');
    Route::post('/register-store', 'AuthController@Store')->name('register-store');
});

Route::group ( ['middleware' => 'login'], function () {
    Route::get('/logout', 'AuthController@Logout')->name('logout');
});
