<?php

namespace App\Http\Requests\Frontend\Customer;

use App\General\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ForgotPasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'email'       => 'required|email|max:100',
        ];
    }

    public function data()
    {
        $data = [
            'email'      => $this->get('email'),

        ];

        return $data;
    }

    public function attributes()
    {
        return [
            'email'       => 'Email',
        ];
    }
}
