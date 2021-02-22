<?php

namespace App\Http\Requests\Backend\Order;

use App\General\OrderConfig;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'     => 'max:150',
            'address'  => 'max:500',
            'sdtKh'     => 'max:20',
            'status' => [
                'nullable',
                Rule::in(array_keys(OrderConfig::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'pay_id'    => $this->get('payID'),
            'customer_id'     => $this->get('customer_id'),
            'name'    => $this->get('name'),
            'address' => $this->get('address'),
            'phone'    => $this->get('phone'),
            'area_id'   => $this->get('area_id'),
        ];

        $data[' created_at'] = now();

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
