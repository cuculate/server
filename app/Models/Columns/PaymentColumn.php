<?php

namespace App\Models\Columns;

trait PaymentColumn
{
    public static $_all = 'payment.*';
    public static $_id = 'payment.id';
    public static $_name = 'payment.name';
    public static $_information = 'payment.information';
    public static $_status = 'payment.status';

}
