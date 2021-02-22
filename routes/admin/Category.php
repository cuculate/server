<?php

Route::prefix('admin')->group(function () {
    Route::get('category','CategoryController@Index');
    Route::get('category/create','CategoryController@Create');
    Route::post('category/store','CategoryController@Store');
    Route::get('category/edit/{id}','CategoryController@Edit');
    Route::put('category/update/{id}','CategoryController@Update');
    Route::delete('category/delete/{ids}','CategoryController@Delete');
});
