<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backend','middleware' => 'auth:api'], function () {
    include('admin/Product.php');
    include('admin/Age.php');
    include('admin/Area.php');
    include('admin/Admin.php');
    include('admin/Brand.php');
    include('admin/Category.php');
    include('admin/Contact.php');
    include('admin/Customer.php');
    include('admin/Feedback.php');
    include('admin/Order.php');
    include('admin/Payment.php');
    include('admin/Statistic.php');
});
Route::namespace( 'Backend')->group(function () {
    include('admin/Login.php');
});

