<?php

Route::prefix('admin')->group(function () {
    Route::get('age', 'AgeController@Index');
    Route::get('age/create', 'AgeController@Create');
    Route::post('age/store', 'AgeController@Store');
    Route::get('age/edit/{id}', 'AgeController@Edit');
    Route::put('age/update/{id}', 'AgeController@Update');
    Route::delete('age/delete/{ids}', 'AgeController@Delete');
});
