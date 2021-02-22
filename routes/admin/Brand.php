<?php

Route::prefix('admin')->group(function () {
    Route::get('brand', 'BrandController@Index');
    Route::get('brand/create', 'BrandController@Create');
    Route::post('brand/store', 'BrandController@Store');
    Route::get('brand/edit/{id}', 'BrandController@Edit');
    Route::put('brand/update/{id}', 'BrandController@Update');
    Route::delete('brand/delete/{ids}', 'BrandController@Delete');
});

