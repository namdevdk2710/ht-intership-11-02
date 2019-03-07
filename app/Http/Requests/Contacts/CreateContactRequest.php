<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'title' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập trường này',
            'fullname.required' => 'Vui lòng nhập trường này',
            'content.required' => 'Vui lòng nhập trường này',
            'email.required' => 'Vui lòng nhập trường này',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập trường này',
            'phone.numeric' => 'Vui lòng nhập đúng định dạng số điện thoại',
        ];
    }
}
