<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'number_of_adults',
        'number_of_children',
        'travel_date',
        'tour_code',
        'tour_name',
        'tour_price',
        'hotel_name',
        'room_code',
        'room_name',
        'room_price',
        'total_price',
        'note',
        'feedback',
        'status',
        'installment_percentage',
        'number_of_installment_months'
    ];

    public function get_orderBy_ASC()
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function create_customes($req)
    {
        $creates = $this->Create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'number_of_adults' => $req->number_of_adults,
            'number_of_children' => $req->number_of_children,
            'travel_date' => $req->travel_date,
            'tour_code' => $req->tour_code,
            'tour_name' => $req->tour_name,
            'tour_price' => $req->tour_price,
            'hotel_name' => $req->hotel_name,
            'room_code' => $req->room_code,
            'room_price' => $req->room_price,
            'installment_percentage' => $req->installment_percentage,
            'number_of_installment_months' => $req->number_of_installment_months,
            'note' => $req->note
        ]);
        return $creates;
    }


    public function get_link_slug($id)
    {
        $obj = DB::table('customers')->where('id', $id)->first();
        return $obj;
    }

    public function update_customer(Request $req, $slug)
    {
        $obj = DB::table('customers')->where('id', $slug)->update([
//
            'feedback' => $req->feedback,
            'number_of_adults' => $req->number_of_adults,
            'number_of_children' => $req->number_of_children,
            'total_tour_price' => $req->total_tour_price,
            'total_room_price' => $req->total_room_price,
            'total_price' => $req->total_price,
            'status' => $req->status
        ]);
        return $obj;
    }
    public function delete_customer($id)
    {
        $obj = DB::table('customers')->where('id', $id)->delete();
        return $obj;
    }
}
