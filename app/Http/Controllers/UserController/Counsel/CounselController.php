<?php

namespace App\Http\Controllers\UserController\Counsel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\createRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Tour;
use App\Helper\storyTour;

class CounselController extends Controller
{
    public function register_counsel(Category $category, Tour $tour,Room $room, Blog $blog, Banner $banner,Contact $contact,storyTour $history)
    {
        $historyTour = $history->list_storyTour();
         $categories  = $category ->get_orderBy_ASC();
        $tour_list = $tour->get_orderBy_ASC();
        $roomsiml = $room->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $banner_list = $banner ->get_orderBy_ASC();
        $contact_list = $contact->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Advise.advise',compact('categories','tour_list','blog_list','banner_list','contact_list','historyTour','roomsiml'));
    }
    public function create_counsel(createRequest $request,Contact $contact)
    {
        $contact->create_contact($request);
        return redirect()->route('home');
        }

}
