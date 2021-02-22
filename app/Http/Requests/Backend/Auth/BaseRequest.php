<?php

namespace App\Http\Requests\Backend\Auth;

use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'email'    => 'required',
            'password' => 'required'
        ];
    }

    public function data()
    {
        return [
            'email'    => $this->get('email'),
            'password' => $this->get('password'),

        ];
    }

    public function attributes()
    {
        return [
            'email'    => 'Email',
            'password' => 'Mật khẩu',
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
