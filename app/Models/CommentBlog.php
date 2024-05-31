<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class CommentBlog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'commen_blog';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'commentUser',
        'commentAdmin',
        'idBlog',
        'status',
    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_comment_blog($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'commentUser' => $req->commentUser,
            'commentAdmin' => $req->commentAdmin??'',
            'idBlog' => $req->idBlog,
            'status' => $req->status,
        ]);
        return $creates;
    }


    public function get_orderBy_ASC_status_page()
    {
        $blog_comment_list = CommentBlog::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
        return $blog_comment_list;
    }

    public function get_link_slug($slug)
    {
        $obj = CommentBlog::with('objBlog')->where('id', $slug)->first();
        return $obj;
    }

    public function delete_comment_blog($id)
    {
        $obj = DB::table('commen_blog')->where('id', $id)->delete();
        return $obj;
    }

    public function objBlog()
    {
        return $this->belongsTo(Blog::class, 'idBlog');
    }

    public function update_comment_blog($req, $slug)
    {
        $obj = DB::table('commen_blog')->where('id', $slug)->update([
            'commentAdmin' => $req->commentAdmin,
            'status' => $req->status
        ]);
        return $obj;
    }
}
