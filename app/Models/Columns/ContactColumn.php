<?php

namespace App\Models\Columns;

trait ContactColumn
{
    public static $_all = 'contact.*';
    public static $_id = 'contact.id';
    public static $_name = 'contact.name';
    public static $_email = 'contact.email';
    public static $_content = 'contact.content';
    public static $_address = 'contact.address';
    public static $_phone = 'contact.phone';
    public static $_created = 'contact.created_at';
    public static $_status = 'contact.status';

}
