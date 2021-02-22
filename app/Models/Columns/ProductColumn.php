<?php

namespace App\Models\Columns;

trait ProductColumn
{
    public static $_all = 'product.*';
    public static $_id = 'product.id';
    public static $_name = 'product.name';
    public static $_categoryID = 'product.category_id';
    public static $_brandID = 'product.brand_id';
    public static $_ageID = 'product.age_id';
    public static $_price = 'product.price';
    public static $_image = 'product.image';
    public static $_created = 'product.created_at';
    public static $_oldPrice = 'product.old_price';
    public static $_sale = 'product.sale';
    public static $_new = 'product.new';
    public static $_stocked = 'product.stocked';
    public static $_solded = 'product.solded';
    public static $_information = 'product.information';
    public static $_madeIn = 'product.made_in';
    public static $_material = 'product.material';
    public static $_color = 'product.color';
    public static $_length = 'product.length';
    public static $_width = 'product.width';
    public static $_height = 'product.height';
    public static $_status = 'product.status';

}
