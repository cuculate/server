<?php

namespace App\Http\Requests\Backend\OrderDetail;

use App\Models\Product;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
