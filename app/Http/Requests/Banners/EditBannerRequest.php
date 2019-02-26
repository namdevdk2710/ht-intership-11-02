<?php

namespace App\Http\Requests\Banners;

use Illuminate\Foundation\Http\FormRequest;

class EditBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'link' => 'required',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'link.required' => 'Vui lòng nhập trường này',
            'image.image' => 'Định dạng không đúng file ảnh',
        ];
    }
}
