<?php

namespace App\Models;

use App\General\Config;
use App\Models\Columns\ProductColumn;

class Product extends BaseModel
{
    use ProductColumn;

    protected $table = 'product';

    public static $name = 'product';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'brand_id',
        'age_id',
        'price',
        'image',
        'created_at',
        'old_price',
        'sale',
        'new',
        'stocked',
        'solded',
        'information',
        'made_in',
        'material',
        'color',
        'length',
        'width',
        'height',
        'status',
    ];

    public function getStatusName()
    {
        return $this->status = Config::STATUS;
    }

    public function category() {
        return $this->hasOne(Category::class,Category::$key,'category_id');
    }

    public function brand() {
        return $this->hasOne(Brand::class,Brand::$key,'brand_id');
    }

    public function age() {
        return $this->hasOne(Age::class,Age::$key,'age_id');
    }

    public function feedback() {
        return $this->hasMany(Feedback::class,'product_id',$this->primaryKey);
    }

}
