<?php

namespace App\Http\Requests\Room;

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
            'idCategory' => 'required',
            'slug' => 'unique:room',
            'status' => 'required',
//            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'price' => 'required|numeric',
//            'filesImage.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Kiểm tra filesImage là hình ảnh
//            'filesVideo.*' => 'nullable|mimetypes:video/quicktime', // Kiểm tra filesVideo là video
        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Trường không được để trống!',
            'idCategory.required' => 'Trường không được để trống!',
            'price.required' => 'Trường không được để trống!',
            'price.numeric' => 'Trường Mặc Định Là Số!',
            'status.required' => 'Trạng thái là bắt buộc!',
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
