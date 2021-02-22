<?php

namespace App\Models;

use App\Models\Columns\CustomerColumn;

class Customer extends BaseModel
{
    public $timestamps = false;


    use CustomerColumn;

    protected $table = 'customer';

    public static $name = 'customer';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'account',
        'password',
        'name',
        'phone',
        'address',
        'email',
        'gender',
        'area_id',
        'status',
    ];

    public function area()
    {
        return $this->hasOne(Area::class,Area::$key,'area_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,Order::$key,$this->primaryKey);
    }
}
