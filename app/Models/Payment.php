<?php

namespace App\Models;

use App\Models\Columns\PaymentColumn;

class Payment extends BaseModel
{
    use PaymentColumn;

    protected $table = 'payment';

    public static $name = 'payment';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'information',
        'status',
    ];

}
