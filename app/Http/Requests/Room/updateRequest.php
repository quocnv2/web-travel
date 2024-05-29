<?php

namespace App\Http\Requests\Room;

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
    public function rules(): array
    {
        return [
            'code' => 'required',
            'name' => 'required',
            'idCategory' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'price' => 'required|numeric',
            'weekendPrice' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Trường không được để trống!',
            'name.required' => 'Trường không được để trống!',
            'idCategory.required' => 'Trường không được để trống!',
            'price.required' => 'Trường không được để trống!',
            'price.numeric' => 'Trường Mặc Định Là Số!',
            'slug.required' => 'Trường không được để trống!',
            'weekendPrice.required' => 'Trường không được để trống!',
            'weekendPrice.numeric' => 'Trường Mặc Định Là Số!',
        ];
    }
}
