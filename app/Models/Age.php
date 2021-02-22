<?php

namespace App\Models;

use App\Models\Columns\AgeColumn;

class Age extends BaseModel
{
    use AgeColumn;

    protected $table = 'age';

    public static $name = 'age';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'month',
        'status',
    ];

}
