<?php

Route::group(['middleware' => 'logout'], function () {
    Route::get('/quen-matkhau','UserController@ForgotPassword')->name('forgot-password');
    Route::post('/reset-mail','UserController@SendMail')->name('reset-mail');
    Route::get('/{id}/reset-matkhau','UserController@ResetPassword')->name('reset-password');
    Route::post('/{id}/update-reset-mail','UserController@UpdateResetPassword')->name('update-reset-password');
});

Route::group ( ['middleware' => 'login'], function () {
    Route::get('/profile/{id}','UserController@Profile')->name('profile');
    Route::get('/profile/{id}/edit','UserController@EditProfile')->name('edit-profile');
    Route::post('/profile/{id}/update','UserController@UpdateProfile')->name('update-profile');
    Route::get('/profile/{id}/change-password','UserController@ChangePassword')->name('change-password');
    Route::post('/profile/{id}/update-password','UserController@UpdatePassword')->name('update-password');
    Route::get('/profile/{id}/orders','OrderController@ListOrder')->name('list-order');
    Route::get('/profile/order/{id}','OrderController@Show')->name('order-show');
    Route::post('/profile/order/delete/{ids}','OrderController@Delete')->name('order-delete');
});
