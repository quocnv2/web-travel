<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Recruitment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'recruitment';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'status',
        'timeCreate',
    ];

    // phương thức thêm mới
    public function create_recruitment($req){
        $currentTime = now();
        $creates = $this->Create([
            'title' => $req -> title,
            'slug' => $req -> slug,
            'content' => $req -> content,
            'status' => $req -> status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }
}
