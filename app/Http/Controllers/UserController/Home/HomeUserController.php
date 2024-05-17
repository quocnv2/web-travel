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
use Illuminate\Support\Facades\DB;

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
    public function search(Category $category, Tour $tourModel, storyTour $history, Request $request)
    {
        // lấy danh mục theo key
        $key = $request->input('key');
        $tour_search = $tourModel-> get_orderBy_ASC_status_pagess($key);

        $categories = $category->get_orderBy_ASC();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();
        // Danh Sách tour
        $tour_list = $tourModel->get_orderBy_ASC_status_page_12();

        return view('Home.Layout.Pages.Search.search', compact('categories', 'tour', 'tour_list', 'historyTour','tour_search'));
    }
  

    public function error404(Category $category){
        $categories  = $category ->get_orderBy_ASC();
        return view('Home.Layout.Pages.404.index', compact('categories'));
    }
}
