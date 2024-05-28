<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'contact';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'titail',
        'email',
        'commentUser',
        'status',
    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_contact($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'phone' => $req->phone,
            'titail' => $req->titail,
            'email' => $req->email,
            'commentUser' => $req->commentUser,
        ]);
        return $creates;
    }


    public function get_orderBy_ASC_status_page()
    {
        $contact_list = Contact::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
        return $contact_list;
    }

    public function get_link_slug($id)
    {
        $obj = DB::table('contact')->where('id', $id)->first();
        return $obj;
    }

    public function deleteContact($id)
    {
        $obj = DB::table('contact')->where('id', $id)->delete();
        return $obj;
    }
}
