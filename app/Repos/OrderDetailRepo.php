<?php

namespace App\Repos;

use App\Models\OrderDetail;

class OrderDetailRepo extends BaseRepo
{
    function model()
    {
        return OrderDetail::class;
    }

}
