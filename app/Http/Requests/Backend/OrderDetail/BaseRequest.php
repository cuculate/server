<?php

namespace App\Http\Requests\Backend\OrderDetail;

use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'quantity'       => 'required',
            'total_price'      => 'required',
        ];
    }

    public function data()
    {
        $data = [
            'product_id'           => $this->session,
            'quantity'          => $this->get('quantity'),
            'total_price'        => $this->get('total_price'),
        ];

        return $data;
    }
}
