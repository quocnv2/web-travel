<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status'
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
            'hotel_name' => $req->hotel_name,
            'room_code' => $req->room_code,
            'note' => $req->note
        ]);
        return $creates;
    }
    public function update_customes($req, $id)
    {
        $updates = $this->find($id);
        $updates->name = $req->name;
        $updates->email = $req->email;
        $updates->phone = $req->phone;
        $updates->number_of_adults = $req->number_of_adults;
        $updates->number_of_children = $req->number_of_children;
        $updates->travel_date = $req->travel_date;
        $updates->tour_code = $req->tour_code;
        $updates->tour_name = $req->tour_name;
        $updates->tour_price = $req->tour_price;
        $updates->hotel_name = $req->hotel_name;
        $updates->room_code = $req->room_code;
        $updates->room_name = $req->room_name;
        $updates->room_price = $req->room_price;
        $updates->total_price = $req->total_price;
        $updates->note = $req->note;
        $updates->feedback = $req->feedback;
        $updates->save();
        return $updates;
    }
    public function delete_customes($id)
    {
        $delete = $this->find($id);
        $delete->delete();
        return $delete;
    }
}
