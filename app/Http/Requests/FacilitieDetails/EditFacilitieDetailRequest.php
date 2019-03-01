<?php

namespace App\Http\Requests\FacilitieDetails;

use Illuminate\Foundation\Http\FormRequest;

class EditFacilitieDetailRequest extends FormRequest
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
            'image' => 'image',
            'content' => 'required',
            'price' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'content.required' => 'Vui lòng nhập trường này',
            'price.required' => 'Vui lòng nhập trường này',
            'image.image' => 'Định dạng không đúng file ảnh',
            'price.max' => 'Không vượt quá 20 số',
        ];
    }
}
