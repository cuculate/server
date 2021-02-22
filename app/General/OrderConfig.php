<?php

namespace App\General;

class OrderConfig
{
    const WAITING = 0;
    const PROCESSING = 1;
    const TRANSPORTING = 2;
    const CANCELED = 3;
    const COMPLETED = 4;
    const REFUNDING = 5;


    const STATUS = [
        self::WAITING      => '<span class="badge badge-warning p-2">Chờ duyệt</span>',
        self::PROCESSING   => '<span class="badge badge-info p-2">Đang chuẩn bị</span>',
        self::TRANSPORTING => '<span class="badge badge-primary p-2">Đang vận chuyển</span>',
        self::CANCELED     => '<span class="badge badge-primary p-2">Đã hủy đơn</span>',
        self::COMPLETED    => '<span class="badge badge-success p-2">Đã giao hàng</span>',
        self::REFUNDING    => '<span class="badge badge-dark p-2">Hoàn trả</span>',
    ];

    const ORDER = [
        self::WAITING      => 'đã được đặt hàng',
        self::PROCESSING   => 'đang chuẩn bị',
        self::TRANSPORTING => 'đang vận chuyển',
        self::CANCELED     => 'đã hủy đơn',
        self::COMPLETED    => 'dã giao hàng',
        self::REFUNDING    => 'hoàn trả',
    ];


}
