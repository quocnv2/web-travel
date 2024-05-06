<?php

namespace App\Rules\Tour;

use App\Models\Tour;
use Illuminate\Contracts\Validation\Rule;

class TourRequest implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Tour::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Tên Tour đã tồn tại.';
    }
}
