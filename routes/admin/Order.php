<?php

Route::prefix('admin')->group(function () {
    Route::get('order', 'OrderController@Index');
    Route::get('order/{id}', 'OrderController@Show');
    Route::put('order/update/{id}', 'OrderController@Update');
    Route::delete('order/delete/{ids}', 'OrderController@Delete');
});
