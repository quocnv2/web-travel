<?php

namespace App\Http\Controllers\UserController\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tour;


class tourController extends Controller
{
    public function listTour(Category $category, Tour $tour){
        $categories  = $category ->get_orderBy_ASC();
        $tourlist = $tour->get_orderBy_ASC_status_page_12();
        $tour = $tour->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist'));
    }
    public function listTour_Category(Category $category, Tour $tour, $slug){
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return view('FEadmin.Pages.Error.error404');
        }
    }
}
