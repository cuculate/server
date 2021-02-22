<?php

namespace App\Http\Requests\Backend\Contact;


use App\General\Config;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'email'    => [
                'required',
                'max:100',
            ],
            'name' => [
                'required',
                'max:100',
            ],
            'content'  => 'required|max:2000',
            'phone'      => 'max:20',
            'address'   => 'max:100',
            'status'  => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'name' => $this->get('name'),
            'email'    => $this->get('email'),
            'content'  => $this->get('content'),
            'phone'      => $this->get('phone'),
            'address'   => $this->get('address'),
        ];
        $data['created_at'] = now();

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
