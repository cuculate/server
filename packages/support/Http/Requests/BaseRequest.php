<?php

namespace Support\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Response\Response;
use Support\Traits\Helpers;

class BaseRequest extends FormRequest
{
    use Helpers;

    public function rules()
    {
        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $response = app(Response::class);
        throw new HttpResponseException($response->ValidateRequestErrors($errors));
    }

    protected function failedAuthorization()
    {
        $response = app(Response::class);
        throw new HttpResponseException($response->NotFound());
    }

    public function render(){}

    public function Translation($id = null)
    {
        $id = is_null($id) ? $id || $this->id : $id;
        return [
            [
                'Id'          => $this->Uuid()->toString(),
                'EntityId'    => $id,
                'Language'    => 'en',
                'Value'       => request('NameEN'),
                'Description' => request('DesEN'),
            ],
            [
                'Id'          => $this->Uuid()->toString(),
                'EntityId'    => $id,
                'Language'    => 'vi',
                'Value'       => request('NameVI'),
                'Description' => request('DesVI'),
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải hơn :min kí tự',
            'max' => ':attribute phải ít hơn :max kí tự',
            'email' => ':attribute phải là một email',
            'image' => ':attribute phải là file ảnh',
        ];
    }



    public function attributes()
    {
        return [
            'account'       => 'Tài khoản',
            'password'       => 'Mật khẩu',
            'email'       => 'Email',
            'name'       => 'Tên',
            'status'       => 'Trạng thái',
            'month'       => 'Tháng',
            'information'       => 'Thông tin',
            'phone'       => 'Số điện thoại',
            'address'       => 'Địa chỉ',
            'website'       => 'Website',
            'content'       => 'Nội dung',
            'gender'       => 'Giới tính',
            'title'       => 'Tiêu đề',
            'image'       => 'Ảnh',
            'category_id'       => 'Danh mục',
            'brand_id'       => 'Hãng',
            'age_id'       => 'Độ tuổi',
        ];
    }
}
