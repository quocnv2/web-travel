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
use App\Models\Customer;

class CounselController extends Controller
{
    public function register_counsel(Category $category, Tour $tour, Room $room, Blog $blog, Banner $banner, Contact $contact, storyTour $history)
    {
        $historyTour = $history->list_storyTour();
        $categories  = $category->get_orderBy_ASC();
        $tour_list = $tour->get_orderBy_ASC();
        $roomsiml = $room->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $banner_list = $banner->get_orderBy_ASC();
        $contact_list = $contact->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Advise.advise', compact('categories', 'tour_list', 'blog_list', 'banner_list', 'contact_list', 'historyTour', 'roomsiml'));
    }
    public function create_counsel(createRequest $request, Customer $customer)
    {
        $customer->create_customes($request);
        if ($customer) {
            return redirect()->route('create_counsel')->with('success', 'Gửi Thông Tin Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Gửi Thông Tin Thất Bại!');
        }
    }
    public function list_cus(Customer $customer){
        $list = $customer -> get_orderBy_ASC();
        return view('FEadmin.Pages.Customer.cus_list', compact('list'));
    }

}
