<?php

Route::prefix('admin')->group(function () {
    Route::get('customer', 'CustomerController@Index');
//    Route::get('customer/create', 'CustomerController@Create');
//    Route::post('customer/store', 'CustomerController@Store');
    Route::get('customer/edit/{id}', 'CustomerController@Edit');
    Route::put('customer/update/{id}', 'CustomerController@Update');
    Route::delete('customer/delete/{ids}', 'CustomerController@Delete');
});
