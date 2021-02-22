<?php

Route::prefix('admin')->group(function () {
    Route::get('area', 'AreaController@Index');
    Route::get('area/create', 'AreaController@Create');
    Route::post('area/store', 'AreaController@Store');
    Route::get('area/edit/{id}', 'AreaController@Edit');
    Route::put('area/update/{id}', 'AreaController@Update');
    Route::delete('area/delete/{ids}', 'AreaController@Delete');
});

