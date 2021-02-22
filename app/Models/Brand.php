<?php

namespace App\Models;

use App\Models\Columns\BrandColumn;

class Brand extends BaseModel
{
    use BrandColumn;

    protected $table = 'brand';

    public static $name = 'brand';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'information',
        'website',
        'email',
        'status',
    ];

}
