<?php

namespace App\Http\Requests\CuisineDetails;

use Illuminate\Foundation\Http\FormRequest;

class EditCuisineDetailRequest extends FormRequest
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
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'amount' => 'required',
            'area' => 'required',
            'price' => 'required|max:10',
            'discount' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'description.required' => 'Vui lòng nhập trường này',
            'content.required' => 'Vui lòng nhập trường này',
            'image.required' => 'Vui lòng nhập ít nhất một ảnh',
            'image.image' => 'Định dạng không đúng file ảnh',
            'amount.required' => 'Vui lòng nhập trường này',
            'area.required' => 'Vui lòng nhập trường này',
            'price.required' => 'Vui lòng nhập trường này',
            'price.max' => 'Không vượt quá 10 số',
            'discount.required' => 'Vui lòng nhập trường này',
            'discount.max' => 'Không vượt quá 10 số',
        ];
    }
}
