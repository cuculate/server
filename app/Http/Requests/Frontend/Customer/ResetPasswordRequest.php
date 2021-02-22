<?php

namespace App\Http\Requests\Frontend\Customer;

use App\General\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'password'       => [
                'required',
                'max:256',
            ],
            're-password'       => [
                'required',
                'max:256',
            ],
        ];
    }

    public function data()
    {
        $data = [
            'password'      => $this->get('password'),
            're-password'      => $this->get('re-password'),

        ];

        return $data;
    }

    public function attributes()
    {
        return [
            'password'       => 'Mật khẩu mới',
            're-password'      => 'Mật khẩu mới lần 2',
        ];
    }
}
