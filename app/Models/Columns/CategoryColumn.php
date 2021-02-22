<?php

namespace App\Models\Columns;

trait CategoryColumn
{
    public static $_all = 'category.*';
    public static $_id = 'category.id';
    public static $_name = 'category.name';
    public static $_parentID = 'category.parent_id';
    public static $_status = 'category.status';

}
