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
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'unique:banner',
            'status' => 'required',
            'file' => 'required',
            'price_adult' => 'required',
            'price_child' => 'required',
//            'info_details_blog' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'price_adult.required' => 'Trường không được để trống!',
            'price_child.required' => 'Trường không được để trống!',
//            'info_details_blog.required' => 'Trường không được để trống!',
            'file.required' => 'Trường Ảnh Không Được Để Trống',
            'slug.unique' => 'Bài viết đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
        ];
    }
}
