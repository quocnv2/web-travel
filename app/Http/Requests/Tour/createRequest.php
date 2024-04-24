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
            'code' => 'required',
            'name' => 'required',
            'idCategory' => 'required',
            'slug' => 'unique:tour',
            'status' => 'required',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'price_adult' => 'required|numeric',
            'price_child' => 'required|numeric',
            'filesImage.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Kiểm tra filesImage là hình ảnh
            'filesVideo.*' => 'nullable|mimetypes:video/avi,video/mpeg,video/quicktime|max:100000', // Kiểm tra filesVideo là video
            'price_adult' => 'required|numeric',
        ];
    }

    public function messages()
{
    return [
        'code.required' => 'Trường không được để trống!',
        'name.required' => 'Trường không được để trống!',
        'idCategory.required' => 'Trường không được để trống!',
        'price_adult.required' => 'Trường không được để trống!',
        'price_child.required' => 'Trường không được để trống!',
        'price_adult.numeric' => 'Trường Mặc Định Là Số!',
        'price_child.numeric' => 'Trường Mặc Định Là Số!',
        'filesImage.*.nullable' => 'Trường ảnh không được để trống',
        'filesImage.*.image' => 'Trường phải là một hình ảnh.',
        'filesImage.*.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
        'filesImage.*.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
        'filesVideo.*.nullable' => 'Trường video không được để trống',
        'filesVideo.*.mimetypes' => 'Chỉ chấp nhận các định dạng video là avi, mpeg, quicktime.',
        'filesVideo.*.max' => 'Kích thước tệp video không được vượt quá 100 megabytes.',
        'slug.unique' => 'Tour đã tồn tại!',
        'status.required' => 'Trạng thái là bắt buộc!',
    ];
}
}
