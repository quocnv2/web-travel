<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourContact extends Model
{
    use HasFactory;

    protected $table = "tour_contact";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'number_of_adults',
        'number_of_children',
        'travel_date',
        'note',
        'feedback',
        'status',

    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_tour_contact($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'number_of_adults' => $req->number_of_adults,
            'number_of_children' => $req->number_of_children,
            'travel_date' => $req->travel_date,
            'feedback' => $req->feedback,
            'note' => $req->note
        ]);
        return $creates;
    }


    public function get_link_slug($id)
    {
        $obj = DB::table('tour_contact')->where('id', $id)->first();
        return $obj;
    }

    public function update_tour_contact(Request $req, $slug)
    {
        $obj = DB::table('tour_contact')->where('id', $slug)->update([
            'feedback' => $req->feedback,
            'status' => $req->status
        ]);
        return $obj;
    }
    public function delete_tour_contact($id)
    {
        $obj = DB::table('tour_contact')->where('id', $id)->delete();
        return $obj;
    }
    public function get_orderBy_ASC_status_page()
    {
        $contact_list = TourContact::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
        return $contact_list;
    }
}
