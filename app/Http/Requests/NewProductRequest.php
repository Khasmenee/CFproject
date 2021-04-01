<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
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
            'show' => 'required',
            'detail' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png,gif',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'กรุณากรอกชื่อของสินค้า',
            'show.required' => 'กรุณากรอกข้อมูลอย่างย่อของสินค้า',
            'detail.required' => 'กรุณากรอกรายละเอียดของสินค้า',
            'cat_id.required' => 'กรุณาเลือกหมวดหมู่ของสินค้า',
            'price.required' => 'กรุณากรอกราคาสินค้า',
        ];
    }
}
