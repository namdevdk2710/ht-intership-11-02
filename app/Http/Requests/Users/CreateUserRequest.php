<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|min:3|unique:users,name',
            'password' => 'required|min:3|max:32',
            'phone' => 'required|max:10|min:5',
            'email' => 'required|email|unique:users,email',
            'passwordAgain' => 'required|same:password',
            'avatar' => 'image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Vui lòng nhập trường này',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập trường này',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
            'passwordAgain.required' => 'Vui lòng nhập trường này',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp',
            'phone.required' => 'Vui lòng nhập trường này',
            'phone.max' => 'Số điện thoại chỉ được tối đa 10 số',
            'phone.min' => 'Số điện thoại không được nhỏ hơn 5 số',
            'avatar.image' => 'Định dạng không đúng file ảnh',
            'avatar.max' => 'Vui lòng nhập đúng kích thước ảnh',
        ];
    }
}
