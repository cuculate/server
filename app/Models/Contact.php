<?php

namespace App\Models;

use App\Models\Columns\ContactColumn;

class Contact extends BaseModel
{
    use ContactColumn;

    protected $table = 'contact';

    public static $name = 'contact';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'email',
        'content',
        'address',
        'phone',
        'created_at',
        'status',
    ];

}
