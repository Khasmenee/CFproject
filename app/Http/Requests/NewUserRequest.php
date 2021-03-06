<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'กรุณากรอกชื่อนามสกุล',
            'email.required' => 'กรุณากรอกข้อมูลอีเมล',
            'password.required' => 'กรุณากรอกข้อมูลรหัสผ่าน',
        ];
    }
}
