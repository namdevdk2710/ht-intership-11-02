<?php

namespace App\Http\Requests\GalleryDetails;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryDetailRequest extends FormRequest
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
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'content.required' => 'Vui lòng nhập trường này',
            'image.required' => 'Vui lòng nhập ít nhất một ảnh',
            'image.image' => 'Định dạng không đúng file ảnh',
        ];
    }
}
