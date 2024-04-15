<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'slug', 'link', 'status', 'timeCreate'];
    public $timestamps = false;
    use HasFactory;

    public function create_category($request)
    {
        $currentTime = now();
        $creates = $this->Create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'timeCreate' => $currentTime
        ]);
        return $creates;
    }
}
