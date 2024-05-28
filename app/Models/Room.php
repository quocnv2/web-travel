<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Room extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'room';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code',
        'name',
        'slug',
        'imgRoom',
        'imageArray',
        'videoArray',
        'content',
        'price',
        'idCategory',
        'province',
        'district',
        'wards',
        'status',
        'timeCreate',
    ];

    public function get_orderBy_ASC_status_page()
    {
        $obj = Room::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(3);
        return $obj;
    }

    // phương thức thêm mới
    public function create_room($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'code' => $req->code,
            'name' => $req->name,
            'slug' => $req->slug,
            'imgRoom' => $req->imgRoom,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'content' => $req->content,
            'price' => $req->price,
            'idCategory' => $req->idCategory,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // Phương Thức lấy bản ghi theo slug
    public function get_link_slug($slug)
    {
        $obj = Room::with('objCategory')->where('slug', $slug)->first();
        return $obj;
    }

    public function delete_room($slug)
    {
        $obj = DB::table('room')->where('slug', $slug)->delete();
        return $obj;
    }

    public function get_orderBy_ASC()
    {
        return Room::with('objCategory')->orderBy('timeCreate','DESC')->get();
    }

    public function update_room($req, $slug)
    {
        $obj = DB::table('room')->where('slug', $slug)->update([
            'code' => $req->code,
            'name' => $req->name,
            'slug' => $req->slug,
            'imgRoom' => $req->imgRoom,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'content' => $req->content,
            'price' => $req->price,
            'idCategory' => $req->idCategory,
            'status' => $req->status,
        ]);
        return $obj;
    }

    public function objCategory()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }

    public function get_orderBy_ASC_status_page_8()
    {
        $obj = Room::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(8);
        return $obj;
    }

    public function get_orderBy_ASC_status_where_category_page_3($idCategory)
    {
        $obj = Room::with('objCategory')->where('status', 0)->where('idCategory', $idCategory)->orderBy('timeCreate', 'DESC')->paginate(3);
        return $obj;
    }
//    public function get_orderBy_ASC_status_page_12(){
//        $obj = Room::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(12);
//        return $obj;
//    }
//    public function get_orderBy_ASC_status_where_category_page_12($idCategory){
//        $obj = Room::with('objCategory')->where('status', 0)->where('idCategory', $idCategory)->orderBy('timeCreate', 'DESC')->paginate(12);
//        return $obj;
//    }

}
