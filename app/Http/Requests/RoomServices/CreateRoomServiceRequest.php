<?php

namespace App\Http\Requests\RoomServices;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomServiceRequest extends FormRequest
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
            'name' => 'required|min:3|unique:room_services,name',
            'icon' => 'required|image|max:30',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập trường này',
            'name.unique' => 'Name đã tồn tại',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'icon.image' => 'Định dạng không đúng file ảnh',
            'icon.max' => 'Vui lòng nhập đúng kích thước của icon',
            'icon.required' => 'Vui lòng nhập trường này',
        ];
    }
}
