<?php

namespace App\Http\Requests\Backend\Product;

class StoreRequest extends BaseRequest
{
    public function data()
    {
        $data = parent::data();
        $data['new'] = 1;
        $data['solded'] = 0;
        $data['old_price'] = 0;
        $data['sale'] = 0;
        $data['created_at'] = now();

        return $data;
    }
}
