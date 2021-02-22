<?php

namespace App\Http\Requests\Backend\Product;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();
        $rules['name'] = [
            'required',
            'max:150',
            Rule::unique(Product::$name)->ignore($this->id, Product::$_id)
        ];
        $rules['image'] = 'nullable';

        if ($this->file('image')) {
            $rules['image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
            ];
        }

        return $rules;
    }
}
