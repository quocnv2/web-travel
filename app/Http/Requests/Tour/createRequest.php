<?php

namespace App\Http\Requests\Tour;

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
            'code' => 'required|unique:tour',
            'name' => 'required',
            'idCategory' => 'required',
            'slug' => 'unique:tour',
            'status' => 'required',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Trường không được để trống!',
            'code.unique' => 'Mã đã tồn tại!',
            'name.required' => 'Trường không được để trống!',
            'idCategory.required' => 'Trường không được để trống!',
            'price.required' => 'Trường không được để trống!',
            'price.numeric' => 'Trường Mặc Định Là Số!',
            'file.required' => 'Ảnh Banner là bắt buộc!',
            'file.nullable' => 'Trường ảnh không được để trống',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
        ];
    }
}
