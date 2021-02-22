<?php

namespace App\Http\Requests\Frontend\Feedback;


use App\General\Config;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'title'  => 'required|max:100',
            'content' => 'required|max:500',
            'status' => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'product_id'      => $this->id,
            'name'     => $this->get('name'),
            'title'  => $this->get('title'),
            'content' => $this->get('content')

        ];

        $data['created_at'] = now();

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
