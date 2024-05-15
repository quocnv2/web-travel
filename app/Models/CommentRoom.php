<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class CommentRoom extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'commen_room';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'commentUser',
        'commentAdmin',
        'idRoom',
        'status',
    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_comment_room($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'commentUser' => $req->commentUser,
            'commentAdmin' => $req->commentAdmin,
            'idRoom' => $req->idRoom,
            'status' => $req->status,
        ]);
        return $creates;
    }


    public function get_orderBy_ASC_status_page()
    {
        $room_comment_list = CommentRoom::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
        return $room_comment_list;
    }

    public function get_link_slug($id)
    {
        $obj = CommentRoom::with('objRoom')->where('id', $id)->first();
        return $obj;
    }

    public function delete_comment_room($id)
    {
        $obj = DB::table('commen_room')->where('id', $id)->delete();
        return $obj;
    }

    public function objRoom()
    {
        return $this->belongsTo(Room::class, 'idRoom');
    }
    public function update_comment_room($req, $slug)
    {
        $obj = DB::table('commen_room')->where('id', $slug)->update([
            'commentAdmin' => $req->commentAdmin,
            'status' => $req->status
        ]);
        return $obj;
    }

}
