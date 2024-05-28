<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
            'name' => 'required',
            'commentUser' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'commentUser.required' => 'Trường không được để trống!',
        ];
    }
}
