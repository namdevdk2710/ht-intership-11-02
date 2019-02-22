<?php

namespace App\Http\Requests\Banners;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
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
            'image' => 'required|image',
            'slug' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',

            'slug.required' => 'Vui lòng nhập trường này',

            'link.required' => 'Vui lòng nhập trường này',

            'image.required' => 'Vui lòng nhập ít nhất một ảnh',
            'image.image' => 'Vui lòng nhập những ảnh có định dạng sau : jpeg-png-bmp-gif-svg',

        ];
    }
}
