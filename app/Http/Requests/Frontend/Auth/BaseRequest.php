<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' =>'required',
            'password' => 'required|min:5'
        ];
    }

    public function data()
    {
        $data = [
            'account' => $this->get('account'),
            'password'  => $this->get('password'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }

    public function attributes()
    {
        return [
            'account'       => 'Tài khoản',
            'password'       => 'Mật khẩu',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải hơn :min kí tự',
            'max' => ':attribute phải ít hơn :max kí tự',
            'email' => ':attribute phải ở dạng email',
        ];
    }
}
