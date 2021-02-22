<?php

namespace App\Http\Requests\Frontend\Order;

use App\General\OrderConfig;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'    => 'required|max:150',
            'address' => 'required|max:500',
            'phone'   => 'required|max:20|min:9',
            'area_id' => 'required',
        ];
    }

    public function data()
    {
        $data = [
            'pay_id'  => $this->get('pay_id'),
            'name'    => $this->get('name'),
            'address' => $this->get('address'),
            'phone'   => $this->get('phone'),
            'area_id' => $this->get('area_id'),
        ];

        $data['created_at'] = now();
        $data['customer_id'] = Session::get('User')->id;
        $data['products'] = Session::get('Cart')->products;

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }


    public function attributes()
    {
        return [
            'name'     => 'Tên người nhận',
            'address' => 'Địa chỉ',
            'phone'    => 'Số điện thoại',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min'      => ':attribute phải hơn :min kí tự',
            'max'      => ':attribute phải ít hơn :max kí tự',
        ];
    }
}
