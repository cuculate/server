<?php

Route::get('/gop-y', 'ContactController@Contact')->name('contact');
Route::post('/gop-y', 'ContactController@SendContact')->name('send-contact');
