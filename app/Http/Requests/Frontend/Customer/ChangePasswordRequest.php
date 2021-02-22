<?php

namespace App\Http\Requests\Frontend\Customer;

use App\General\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'old-password'       => [
                'required',
                'max:256',
            ],
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
            'old-password'      => $this->get('old-password'),
            'password'      => $this->get('password'),
            're-password'      => $this->get('re-password'),

        ];

        return $data;
    }

    public function attributes()
    {
        return [
            'old-password'       => 'Mật khẩu cũ',
            'password'       => 'Mật khẩu mới',
            're-password'      => 'Mật khẩu mới lần 2',
        ];
    }
}
