<?php

Route::prefix('admin')->group(function () {
    Route::get('product', 'ProductController@Index');
    Route::get('product/create', 'ProductController@Create');
    Route::post('product/store', 'ProductController@Store');
    Route::get('product/edit/{id}', 'ProductController@Edit');
    Route::post('product/update/{id}', 'ProductController@Update');
    Route::delete('product/delete/{ids}', 'ProductController@Delete');
});

