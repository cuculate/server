<?php

namespace App\Models\Columns;

trait OrderColumn
{
    public static $_all = 'orders.*';
    public static $_id = 'orders.id';
    public static $_payID = 'orders.pay_id';
    public static $_customerID = 'orders.customer_id';
    public static $_created = 'orders.created_at';
    public static $_updated = 'orders.updated_at';
    public static $_name = 'orders.name';
    public static $_address = 'orders.address';
    public static $_phone = 'orders.phone';
    public static $_areaID = 'orders.area_id';
    public static $_status = 'orders.status';

}
