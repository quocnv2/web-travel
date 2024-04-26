<?php

namespace App\Rules\Banner;

use App\Models\Banner;
use Illuminate\Contracts\Validation\Rule;

class BannerRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Banner::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Tiêu đề đã tồn tại.';
    }
}
