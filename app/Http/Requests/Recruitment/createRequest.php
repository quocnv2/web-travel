<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'slug' => 'unique:recruitment',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Trường không được để trống!',
            'content.required' => 'Trường không được để trống!',
            'slug.unique' => 'Bài viết đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
        ];
    }
}
