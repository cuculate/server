<?php

Route::prefix('admin')->group(function () {
    Route::get('admin', 'AdminController@Index');
    Route::get('admin/create', 'AdminController@Create');
    Route::post('admin/store', 'AdminController@Store');
    Route::get('admin/edit/{id}', 'AdminController@Edit');
    Route::put('admin/update/{id}', 'AdminController@Update');
    Route::delete('admin/delete/{ids}', 'AdminController@Delete');
});
