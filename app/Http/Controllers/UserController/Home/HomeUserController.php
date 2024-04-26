<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index(Category $category, Tour $tour, Blog $blog, Banner $banner){
        $categories  = $category ->get_orderBy_ASC();
        $tour_list = $tour->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $banner_list = $banner ->get_orderBy_ASC();
        return view('Home.master', compact('categories','tour_list','blog_list','banner_list'));
    }
}
