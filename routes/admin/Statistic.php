<?php

Route::prefix('admin')->group(function () {
    Route::get('statistic', 'StatisticController@Index');
});
