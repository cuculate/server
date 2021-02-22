<?php

namespace App\Models;

use App\General\Config;
use App\General\OrderConfig;
use App\Models\Columns\OrderColumn;

class Order extends BaseModel
{
    use OrderColumn;

    protected $table = 'orders';

    public static $name = 'orders';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'pay_id',
        'customer_id',
        'created_at',
        'updated_at',
        'name',
        'address',
        'phone',
        'area_id',
        'status',
    ];


    public function Detail()
    {
        return $this->hasMany(OrderDetail::class, OrderDetail::$key, $this->primaryKey);
    }


    public function orderDetail()
    {
        return $this->belongsToMany(Product::class, OrderDetail::class,  OrderDetail::$key, 'product_id')
            ->withPivot('quantity', 'total_price');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, Payment::$key, 'pay_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, Customer::$key, 'customer_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, Area::$key, 'area_id');
    }

}
