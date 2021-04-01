<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequest extends FormRequest
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
            'detail' => 'required',         
        ];
    }
    public function messages(){
        return[
            'name.required' => 'กรุณากรอกชื่อหมวดหมู่สินค้า',
            'detail.required' => 'กรุณากรอกข้อมูลรายละเอียด',
        ];
    }
}
