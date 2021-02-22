<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@Index')->name('home');
    include('frontend/Auth.php');
    include('frontend/User.php');
    include('frontend/Product.php');
    include('frontend/Cart.php');
    include('frontend/Feedback.php');
    include('frontend/Contact.php');
    include('frontend/Post.php');
});
