<?php

namespace App\Http\Requests\Frontend\Customer;


use App\General\Config;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class BaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account'  => [
                'required',
                'max:30',
                Rule::unique(Customer::$name),
                Rule::unique(Admin::$name),
            ],
            'password' => [
                'required',
                'max:256',
            ],
            'name'     => 'required|max:100',
            'phone'    => 'max:20|min:9',
            'address'  => 'max:500',
            'email'    => 'required|max:100',
            'gender'   => [
                'required',
                Rule::in(array_keys(Config::GENDER)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'account'  => $this->get('account'),
            'password' => Hash::make($this->get('password')),
            'name'     => $this->get('name'),
            'phone'    => $this->get('phone'),
            'address'  => $this->get('address'),
            'email'    => $this->get('email'),
            'gender'   => $this->get('gender'),
            'area_id'  => $this->get('area_id'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }

    public function attributes()
    {
        return [
            'account'  => 'Tài khoản',
            'password' => 'Mật khẩu',
            'name'     => 'Tên',
            'phone'    => 'Số điện thoại',
            'address'  => 'Địa chỉ',
            'email'    => 'Email',
            'gender'   => 'Giới tính',
            'area_id'  => 'Tỉnh',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min'      => ':attribute phải hơn :min kí tự',
            'max'      => ':attribute phải ít hơn :max kí tự',
            'email'    => ':attribute phải ở dạng email',
        ];
    }
}
