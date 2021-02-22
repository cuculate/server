<?php

Route::get('/gio-hang', 'CartController@Index')->name('cart');
Route::get('/them-gio-hang/{id}', 'CartController@AddCart')->name('add-cart');
Route::get('/xoa-gio-hang/{id}', 'CartController@DeleteItemCart')->name('delete-cart');
Route::get('/cap-nhat-soluong-san-pham/{id}/{quanty}', 'CartController@ChangeQuanty')->name('change-quanty');
Route::get('/mua-hang', 'CartController@Purchase')->name('purchase')->middleware(['login','cart']);
Route::post('/order', 'CartController@Order')->name('order')->middleware(['login','cart']);;
