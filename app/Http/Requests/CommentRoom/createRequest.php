<?php

namespace App\Http\Requests\CommentRoom;

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
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Họ và Tên Không Được Để Trống!',

        ];
    }
}
