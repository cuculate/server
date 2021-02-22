<?php

namespace App\Models\Columns;

trait AdminColumn
{
    public static $_all = 'admin.*';
    public static $_id = 'admin.id';
    public static $_account = 'admin.account';
    public static $_email = 'admin.email';
    public static $_password = 'admin.password';
    public static $_status = 'admin.status';

}
