<?php

namespace App\Http\Requests\Banner;

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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'slug' => 'unique:banner',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'linkCourses' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'file.required' => 'Trường không được để trống!',
            'linkCourses.required' => 'Trường không được để trống!',
            'slug.unique' => 'Bài viết đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
        ];
    }
}
