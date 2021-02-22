<?php

namespace App\Http\Requests\Backend\Product;


use App\General\Config;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'        => [
                'required',
                'max:150',
                Rule::unique(Product::$name),
            ],
            'category_id' => 'required',
            'image'       => 'required',
            'brand_id'    => 'required',
            'age_id'      => 'required',
            'status'      => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'name'        => $this->get('name'),
            'category_id' => $this->get('category_id'),
            'brand_id'    => $this->get('brand_id'),
            'age_id'      => $this->get('age_id'),
            'price'       => $this->get('price'),
            'new'         => $this->get('new'),
            'stocked'     => $this->get('stocked'),
            'information' => $this->get('information'),
            'made_in'     => $this->get('made_in'),
            'material'    => $this->get('material'),
            'color'       => $this->get('color'),
            'length'      => $this->get('length'),
            'width'       => $this->get('width'),
            'height'      => $this->get('height'),

        ];

        if ($this->has('old_price')) {
            $data['old_price'] = $this->get('old_price');
        }
        if ($this->has('sale')) {
            $data['sale'] = $this->get('sale');
        }

        if ($this->has('solded')) {
            $data['solded'] = $this->get('solded');
        }

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        if ($this->file('image')) {
            $image_path = public_path("images/sanpham/" . $this->get('old_image'));
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $image = $this->file('image');
            $new_name = rand(1111111111, 9999999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sanpham'), $new_name);
            $data['image'] = $new_name;
        }

        return $data;
    }
}
