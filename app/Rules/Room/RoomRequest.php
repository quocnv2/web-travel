<?php

namespace App\Rules\Room;

use App\Models\Room;
use Illuminate\Contracts\Validation\Rule;

class RoomRequest implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Room::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Tên Room đã tồn tại.';
    }
}
