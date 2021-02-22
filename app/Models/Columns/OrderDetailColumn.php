<?php

namespace App\Models\Columns;

trait OrderDetailColumn
{
    public static $_all = 'order_detail.*';
    public static $_orderID = 'order_detail.order_id';
    public static $_productID = 'order_detail.product_id';
    public static $_quantity = 'order_detail.quantity';
    public static $_totalPrice = 'order_detail.total_price';

}
