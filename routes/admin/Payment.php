<?php

Route::prefix('admin')->group(function () {
    Route::get('payment', 'PaymentController@Index');
    Route::get('payment/create', 'PaymentController@Create');
    Route::post('payment/store', 'PaymentController@Store');
    Route::get('payment/edit/{id}', 'PaymentController@Edit');
    Route::put('payment/update/{id}', 'PaymentController@Update');
    Route::delete('payment/delete/{ids}', 'PaymentController@Delete');
});
