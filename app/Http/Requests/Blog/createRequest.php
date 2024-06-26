<?php

namespace App\Http\Requests\Blog;

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

    public function rules(): array
    {
        return [
            'name' => 'required',
            'idCategory' => 'required',
            'slug' => 'unique:blog',
            'status' => 'required',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'idCategory.required' => 'Trường không được để trống!',
            'slug.unique' => 'Bài viết đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
            'filesImage.*.nullable' => 'Trường ảnh không được để trống',
            'file.required' => 'Ảnh Banner là bắt buộc!',
            'file.nullable' => 'Trường ảnh không được để trống',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
        ];
    }
}
