<?php

namespace App\Models\Columns;

trait FeedbackColumn
{
    public static $_all = 'feedback.*';
    public static $_id = 'feedback.id';
    public static $_productID = 'feedback.product_id';
    public static $_name = 'feedback.name';
    public static $_title = 'feedback.title';
    public static $_created = 'feedback.created_at';
    public static $_content = 'feedback.content';
    public static $_status = 'feedback.status';
    public static $_star = 'feedback.star';

}
