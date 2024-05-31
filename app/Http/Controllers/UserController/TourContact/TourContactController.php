<?php

namespace App\Http\Controllers\UserController\TourContact;

use App\Helper\storyTour;
use App\Http\Controllers\Controller;
use App\Http\Requests\TourContact\createRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Tour;
use App\Models\TourContact;

class TourContactController extends Controller
{
    public function tour_contact(Category $category, Tour $tour, Room $room, Blog $blog, Contact $contact, storyTour $history)
    {
        $historyTour = $history->list_storyTour();
        $categories = $category->get_orderBy_ASC();
        $tour_list = $tour->get_orderBy_ASC_status_page();
        $roomsiml = $room->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.TourContact.contact', compact('categories', 'tour_list', 'blog_list', 'historyTour', 'roomsiml'));
    }

    public function create_tour_contact(createRequest $req, TourContact $contact)
    {
        //Thực hiện thêm mới
        $create = $contact->create_tour_contact($req);

        if ($create) {
            return redirect()->route('create_tour_contact')->with('success', 'Gửi Thông Tin Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Gửi Thông Tin Thất Bại!');
        }
    }

    public function view_list(TourContact $contact)
    {
        $list = $contact->get_orderBy_ASC();
        return view('FEadmin.Pages.TourContact.view_list', compact('list'));
    }
}
