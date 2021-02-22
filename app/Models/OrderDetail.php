<?php

namespace App\Models;

use App\Models\Columns\OrderDetailColumn;
use Illuminate\Support\Facades\DB;

class OrderDetail extends BaseModel
{
    use OrderDetailColumn;

    protected $table = 'order_detail';

    public static $name = 'order_detail';

    protected $primaryKey = "order_id";

    public static $key = "order_id";

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, Order::$key, $this->primaryKey);
    }
}
