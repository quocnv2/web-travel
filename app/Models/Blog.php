<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'blog';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'imgBanner',
        'imageArray',
        'videoArray',
        'info_details_blog',
        'idCategory',
        'codeTour',
        'nameTour',
        'status',
        'timeCreate',
    ];

    public function get_orderBy_ASC_status_page(){
        $obj = Blog::with('objCategory')->where('status', 0)->orderBy('timeCreate', 'DESC')->paginate(3);
        return $obj;
    }

    // phương thức thêm mới
    public function create_blog($req)
    {
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'info_details_blog' => $req->info_details_blog,
            'idCategory' => $req->idCategory,
            'codeTour' => $req->codeTour,
            'nameTour' => $req->nameTour,
            'status' => $req->status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // Phương Thức lấy bản ghi theo slug
    public function get_link_slug($slug)
    {
        $obj = DB::table('blog')->where('slug', $slug)->first();
        return $obj;
    }

    public function delete_blog($slug)
    {
        $obj = DB::table('blog')->where('slug', $slug)->delete();
        return $obj;
    }

    public function get_orderBy_ASC()
    {
        return $this->orderBy('timeCreate', 'DESC')->get();
    }

    public function update_blog($req, $slug)
    {
        $obj = DB::table('blog')->where('slug', $slug)->update([
            'name' => $req->name,
            'slug' => $req->slug,
            'imgBanner' => $req->imgBanner,
            'imageArray' => json_encode($req->imageArray),
            'videoArray' => json_encode($req->videoArray),
            'info_details_blog' => $req->info_details_blog,
            'idCategory' => $req->idCategory,
            'codeTour' => $req->codeTour,
            'nameTour' => $req->nameTour,
            'status' => $req->status,
        ]);
        return $obj;
    }

    public function objCategory()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }
}
