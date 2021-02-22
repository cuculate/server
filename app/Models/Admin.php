<?php

namespace App\Models;

use App\Models\Columns\AdminColumn;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements JWTSubject
{
    public $timestamps = false;

    use AdminColumn;

    protected $table = 'admin';

    public static $name = 'admin';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'account',
        'email',
        'password',
        'status',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

}
