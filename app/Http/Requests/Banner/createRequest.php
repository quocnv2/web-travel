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
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'linkCourses' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'file.required' => 'Trường Ảnh Không Được Để Trống',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
            'linkCourses.required' => 'Trường không được để trống!',
            'slug.unique' => 'Bài viết đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
        ];
    }
}
