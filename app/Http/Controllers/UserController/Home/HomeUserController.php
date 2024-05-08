<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Tour;
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

    public function error404(Category $category){
        $categories  = $category ->get_orderBy_ASC();
        return view('Home.Layout.Pages.404.index', compact('categories'));
    }
}
