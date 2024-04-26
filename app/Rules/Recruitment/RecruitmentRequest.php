<?php

namespace App\Rules\Recruitment;

use App\Models\Recruitment;
use Illuminate\Contracts\Validation\Rule;

class RecruitmentRequest implements Rule
{
    protected $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function passes($attribute, $value)
    {
        return Recruitment::where('slug', $value)->where('slug', '!=', $this->slug)->doesntExist();
    }

    public function message()
    {
        return 'Tiều đề tuyển dụng đã tồn tại.';
    }
}
