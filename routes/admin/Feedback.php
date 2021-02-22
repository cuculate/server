<?php

Route::prefix('admin')->group(function () {
    Route::get('feedback', 'FeedbackController@Index');
    Route::delete('feedback/delete/{ids}', 'FeedbackController@Delete');
});
