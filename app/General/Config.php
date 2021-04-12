<?php

namespace App\General;

class Config
{
    const ACTIVE = 1;
    const BLOCKED = 2;
    const DELETED = 3;
    const MALE = 4;
    const FEMALE = 5;
    const NEW = 6;
    const HOT = 7;
    const SALE = 8;
    const TOKEN_ALIVE = 30; //minutes

    const DATE_DEFAULT = 'Y-m-d';
    const DATE_FULL = 'Y-m-d H:i:s';

    const STATUS = [
        self::ACTIVE  => '<span class="badge badge-success">Hoạt động</span>',
        self::BLOCKED => '<span class="badge badge-warning">Khoá</span>',
    ];

    const GENDER = [
        self::MALE => '<span class="badge badge-success">Nam</span>',
        self::FEMALE => '<span class="badge badge-success">Nữ</span>',
    ];
}
