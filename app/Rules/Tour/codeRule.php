<?php

namespace App\Rules\Tour;

use App\Models\Tour;
use Illuminate\Contracts\Validation\Rule;

class codeRule implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Tour::where('code', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Mã đã tồn tại.';
    }
}
