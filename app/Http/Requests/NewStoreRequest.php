<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewStoreRequest extends FormRequest
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
            'store_name' => 'required',
            'detail' => 'required',
            'manager_name' => 'required',
            'Admin_name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png,gif',
            'address' => 'required',
            'telephone' => 'required',
            'line_id' => 'required',
            'facebook_page' => 'required',
            'topic_homepage' => 'required',
            'topic_workings' => 'required',
        ];
    }
}
