<?php

namespace App\Http\Requests\Introduces;

use Illuminate\Foundation\Http\FormRequest;

class CreateIntroduceRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'address.required' => 'Vui lòng nhập trường này',
            'email.required' => 'Vui lòng nhập trường này',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập trường này',
            'phone.numeric' => 'Vui lòng nhập đúng định dạng số điện thoại',
        ];
    }
}
