<?php

namespace App\Http\Controllers\UserController\Tour;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;

class TourControllerUser extends Controller
{
    public function listTour(Category $category, Tour $tour){
        $categories  = $category ->get_orderBy_ASC();
        $tour_new = $tour->get_orderBy_ASC_status_page();
        $blog_list = $tour->get_orderBy_ASC_status_page_8();
        return view('Home.Layout.Pages.Tour.tour_list', compact('categories', 'tour_new', 'blog_list'));
    }

    public function detailTour(Category $category, Tour $tour, $slug){
        $objTour= $tour->get_link_slug($slug);
        if (!$objTour) {
            return view('FEadmin.Pages.Error.error404');
        }

        $categories  = $category ->get_orderBy_ASC();
        $blog_new = $tour->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Tour.tour_details', compact('categories', 'blog_new', 'objTour'));
    }
}
