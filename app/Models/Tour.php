<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Tour extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tour';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'imgBanner',
        'imageArray',
        'videoArray',
        'info_details_blog',
        'price_adult',
        'price_child',
        'idCategory',
        'province',
        'district',
        'wards',
        'status',
        'timeCreate',
    ];

    // phương thức thêm mới
    public function create_tour($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => $req->imageArray,
            'videoArray' => $req->videoArray,
            'info_details_blog' => $req->info_details_blog,
            'price_adult' => $req->price_adult,
            'price_child' => $req->price_child,
            'idCategory' => $req->idCategory,
            'province' => $req->province,
            'district' => $req->district,
            'wards' => $req->wards,
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
        $obj = DB::table('tour')->where('slug', $slug)->first();
        return $obj;
    }

    public function delete_tour($slug)
    {
        $obj = DB::table('tour')->where('slug', $slug)->delete();
        return $obj;
    }

    public function update_tour($req, $slug)
    {
        $obj = DB::table('tour')->where('slug', $slug)->update([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => $req->imageArray,
            'videoArray' => $req->videoArray,
            'info_details_blog' => $req->info_details_blog,
            'price_adult' => $req->price_adult,
            'price_child' => $req->price_child,
            'idCategory' => $req->idCategory,
            'province' => $req->province,
            'district' => $req->district,
            'wards' => $req->wards,
            'status' => $req->status,
        ]);
        return $obj;
    }
}
