<?php

namespace App\Http\Controllers\AdminController\ContactTour;

use App\Http\Controllers\Controller;
use App\Models\TourContact;
use Illuminate\Http\Request;

class TourContactAdminController extends Controller
{
    public function tour_contact_list(TourContact $tourContact)
    {
        $list = $tourContact->get_orderBy_ASC();
        return view('FEadmin.Pages.TourContact.tour_contact_list', compact('list'));
    }

    public function detail_tour_contact(TourContact $tourContact, $slug)
    {
        $obj = $tourContact->get_link_slug($slug);
        return response()->json($obj);
    }

    public function update_tour_contact(Request $req, TourContact $tourContact, $slug)
    {

        if ($tourContact->update_tour_contact($req, $slug) >= 0) {
            return redirect()->route('tour_contact_list')->with('success', 'Cập Nhật Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Thất Bại!');
        }
    }


    public function delete_tour_contact(TourContact $tourContact, $slug)
    {
        $obj = $tourContact->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($tourContact->delete_tour_contact($slug) > 0) {
            return redirect()->route('tour_contact_list')->with('success', 'Xóa Thành Công!');
        } else {
            return redirect()->route('tour_contact_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }
}
