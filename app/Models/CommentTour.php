<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class CommentTour extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'commen_tour';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'commentUser',
        'commentAdmin',
        'idTour',
        'status',
    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_comment_tour($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'commentUser' => $req->commentUser,
            'commentAdmin' => $req->commentAdmin ?? "",
            'idTour' => $req->idTour,
            'status' => $req->status,
        ]);
        return $creates;
    }


    public function get_orderBy_ASC_status_page()
    {
        $tour_comment_list = CommentTour::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
        return $tour_comment_list;
    }

    public function get_link_slug($slug)
    {
        $obj = CommentTour::with('objTour')->where('id', $slug)->first();
        return $obj;
    }

    public function delete_comment_tour($id)
    {
        $obj = DB::table('commen_tour')->where('id', $id)->delete();
        return $obj;
    }

    public function objTour()
    {
        return $this->belongsTo(Tour::class, 'idTour');
    }

    public function update_comment_tour($req, $slug)
    {
        $obj = DB::table('commen_tour')->where('id', $slug)->update([
            'commentAdmin' => $req->commentAdmin,
        ]);
        return $obj;
    }
}
