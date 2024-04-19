<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Banner extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'banner';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'imgBanner',
        'linkCourses',
        'status',
        'timeCreate',
    ];

    public function create_banner($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'linkCourses' => $req->linkCourses,
            'status' => $req->status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    public function get_orderBy_ASC()
    {
        return $this->orderBy('timeCreate', 'DESC')->get();
    }

    public function get_link_slug($slug)
    {
        $obj = DB::table('banner')->where('slug', $slug)->first();
        return $obj;
    }

    public function delete_Banner($slug)
    {
        $obj = DB::table('banner')->where('slug', $slug)->delete();
        return $obj;
    }

    public function update_Banner($req, $slug)
    {
        $obj = DB::table('banner')->where('slug', $slug)->update([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'linkCourses' => $req->linkCourses,
            'status' => $req->status,
        ]);
        return $obj;
    }
}
