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
    public function create_recruitment($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'title' => $req->title,
            'slug' => $req->slug,
            'content' => $req->content,
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
        $obj = DB::table('recruitment')->where('slug', $slug)->first();
        return $obj;
    }

    public function deleteRecruitment($slug)
    {
        $obj = DB::table('recruitment')->where('slug', $slug)->delete();
        return $obj;
    }

    public function update_recruitment($req, $slug)
    {
        $obj = DB::table('recruitment')->where('slug', $slug)->update([
            'title' => $req->title,
            'slug' => $req->slug,
            'content' => $req->content,
            'status' => $req->status,
        ]);
        return $obj;
    }
    public function get_orderBy_ASC_status_page(){
        return Recruitment::where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(3);
    }
    public function get_orderBy_ASC_status_page_8(){
        $obj = Recruitment::where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(8);
        return $obj;
    }

}
