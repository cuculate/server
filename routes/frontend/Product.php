<?php

Route::get('/sanpham', 'ProductController@Search')->name('search');
Route::get('/khuyen-mai', 'ProductController@SaleProduct')->name('sale');
Route::get('/ban-chay', 'ProductController@HotProduct')->name('hot');
Route::get('/san-pham-moi', 'ProductController@NewProduct')->name('new');
Route::get('/chitietsp={id}', 'ProductController@Show')->name('show');
