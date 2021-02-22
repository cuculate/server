<?php

namespace App\Models\Columns;

trait CustomerColumn
{
    public static $_all = 'customer.*';
    public static $_id = 'customer.id';
    public static $_account = 'customer.account';
    public static $_password = 'customer.password';
    public static $_name = 'customer.name';
    public static $_phone = 'customer.phone';
    public static $_address = 'customer.address';
    public static $_email = 'customer.email';
    public static $_gender = 'customer.gender';
    public static $_areaID = 'customer.area_id';
    public static $_status = 'customer.status';

}
