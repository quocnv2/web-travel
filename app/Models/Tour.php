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
        'code',
        'name',
        'slug',
        'imgBanner',
        'imageArray',
        'videoArray',
        'info_details_blog',
        'price',
        'idCategory',
        'province',
        'district',
        'wards',
        'status',
        'timeCreate',
    ];

    public function get_orderBy_ASC_status_pagess($key){
        $obj = Tour::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->where('name', 'like', '%' . $key . '%')->get();
        return $obj;
    }
    public function get_orderBy_ASC_status_page_12(){
        $obj = Tour::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(12);
        return $obj;
    }

    public function get_orderBy_ASC_status_where_category_page_12($idCategory){
        $obj = Tour::with('objCategory')->where('status', 0)->where('idCategory', $idCategory)->orderBy('timeCreate', 'DESC')->paginate(12);
        return $obj;
    }

    public function get_orderBy_ASC_status_page(){
        $obj = Tour::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(6);
        return $obj;
    }

    // phương thức thêm mới
    public function create_tour($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req->name,
            'code' => $req->code,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'info_details_blog' => $req->info_details_blog,
            'price' => $req->price,
            'idCategory' => $req->idCategory,
            'province' => $req->province,
            'district' => $req->district,
            'wards' => $req->wards,
            'status' => $req->status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // Phương Thức lấy bản ghi theo slug
    public function get_link_code_0($slug)
    {
        $obj = Tour::with('objCategory')->where('status = 0', $slug)->first();
        return $obj;
    }


    public function get_link_code($slug)
    {
        $obj = Tour::with('objCategory')->where('code', $slug)->first();
        return $obj;
    }

    // Phương Thức lấy bản ghi theo slug
    public function get_link_slug($slug)
    {
        $obj = Tour::with('objCategory')->where('slug', $slug)->first();
        return $obj;
    }

    public function delete_Tour($slug)
    {
        $obj = DB::table('tour')->where('slug', $slug)->delete();
        return $obj;
    }

    public function get_orderBy_ASC_Where_status(){
        return Tour::with('objCategory')->where('status', 1)->orderBy('timeCreate','DESC')->get();
    }

    public function get_orderBy_ASC(){
        return Tour::with('objCategory')->orderBy('timeCreate','DESC')->get();
    }

    public function update_tour($req, $slug)
    {
        $obj = DB::table('tour')->where('slug', $slug)->update([
            'name' => $req->name,
            'code' => $req->code,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'info_details_blog' => $req->info_details_blog,
            'price' => $req->price,
            'idCategory' => $req->idCategory,
            'province' => $req->province,
            'district' => $req->district,
            'wards' => $req->wards,
            'status' => $req->status,
        ]);
        return $obj;
    }

    public function objCategory()
    {
        return $this-> belongsTo(Category::class,'idCategory');
    }
}
