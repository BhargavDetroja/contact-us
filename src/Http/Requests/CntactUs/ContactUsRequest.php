<?php

namespace YudizBhargav\ContactUs\Http\Requests\CntactUs;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:50|min:3',
            'email' => 'required|email|max:80|unique:contact_us,email',
            'mobile_number' => 'required|min:6|max:16|unique:contact_us,mobile_number',
            'message' => 'required|max:300|min:3',
            'image'=>'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
