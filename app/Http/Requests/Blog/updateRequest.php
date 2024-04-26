<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'idCategory' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống!',
            'idCategory.required' => 'Trường không được để trống!',
            /*'filesImage.*.nullable' => 'Trường ảnh không được để trống',
            'filesImage.*.image' => 'Trường phải là một hình ảnh.',
            'filesImage.*.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'filesImage.*.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',
            'filesVideo.*.nullable' => 'Trường video không được để trống',
            'filesVideo.*.mimetypes' => 'Chỉ chấp nhận các định dạng video',
            'slug.unique' => 'Tour đã tồn tại!',
            'status.required' => 'Trạng thái là bắt buộc!',
            'file.required' => 'Ảnh Banner là bắt buộc!',
            'file.nullable' => 'Trường ảnh không được để trống',
            'file.image' => 'Trường phải là một hình ảnh.',
            'file.mimes' => 'Chỉ chấp nhận các định dạng hình ảnh là jpeg, png, jpg, gif.',
            'file.max' => 'Kích thước tệp hình ảnh không được vượt quá 10 megabytes.',*/
        ];
    }
}
