<?php

namespace App\Http\Requests\Backend\Area;

use App\General\Config;
use App\Models\Area;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'   => [
                'required',
                'max:30',
                Rule::unique(Area::$name),
            ],
            'information'      => 'required|max:50',
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
            'information'    => $this->get('information'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
