<?php

namespace App\Models;

use App\Models\Columns\AreaColumn;

class Area extends BaseModel
{
    use AreaColumn;

    protected $table = 'area';

    public static $name = 'area';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'information',
        'status',
    ];

}
