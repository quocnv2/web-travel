<?php

namespace App\Http\Requests\TourContact;

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
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/'],
            'number_of_adults' => 'required',
            'number_of_children' => 'required',
            'travel_date' => 'required',
        ];
    }
    public function messages(){
        return [
            'number_of_adults.required' => 'Bạn Chưa Điền Số Lượng Vé Người Lớn!',
            'number_of_children.required' => 'Bạn Chưa Điền Số Lượng Vé Trẻ Em!',
            'name.required' => 'Họ và Tên Không Được Để Trống!',
            'travel_date.required' => 'Bạn Chưa Chọn Ngày Đặt',
            'phone.required' => 'Số Điện Thoại Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng Số Điện Thoại!',
        ];
    }
}
