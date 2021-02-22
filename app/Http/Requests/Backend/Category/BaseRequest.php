<?php

namespace App\Http\Requests\Backend\Category;


use App\General\Config;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'   => [
                'required',
                'max:50',
                Rule::unique(Category::$name),
            ],
            'parent_id'       => 'nullable',
            'status' => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'name' => $this->get('name'),
            'parent_id'  => $this->get('parent_id'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
