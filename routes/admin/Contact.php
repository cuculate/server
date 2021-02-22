<?php

Route::prefix('admin')->group(function () {
    Route::get('contact', 'ContactController@Index');
    Route::delete('contact/delete/{ids}', 'ContactController@Delete');
});
