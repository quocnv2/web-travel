<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Tour;
use App\Helper\storyTour;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index(Category $category, Tour $tour, Blog $blog, Banner $banner,Contact $contact){
        $categories  = $category ->get_orderBy_ASC();
        $tour_list = $tour->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $banner_list = $banner ->get_orderBy_ASC();
        $contact_list = $contact->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Home.index', compact('categories','tour_list','blog_list','banner_list','contact_list'));
    }
    public function search(Category $category,  Tour $tourModel, storyTour $history){
        
        // $objCategory = $category->get_link_slug($slug);
        // $slugCate = $slug;
        // $objTour = $tourModel->get_link_slug($slug);
        // $objRoom = $room->get_link_slug($slug);
        $historyTour = $history->list_storyTour();
        $categories  = $category ->get_orderBy_ASC();
        $tour_list = $tourModel->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Search.search', compact('categories','tour_list','historyTour'));
    }

    public function error404(Category $category){
        $categories  = $category ->get_orderBy_ASC();
        return view('Home.Layout.Pages.404.index', compact('categories'));
    }
}
