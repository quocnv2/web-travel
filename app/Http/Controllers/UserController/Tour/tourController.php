<?php

namespace App\Http\Controllers\UserController\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tour;
use App\Helper\storyTour;

class tourController extends Controller
{
    public function listTour(Category $category, Tour $tour, storyTour $history){
        $categories  = $category ->get_orderBy_ASC();
        // Danh Sách tour
        $tourlist = $tour->get_orderBy_ASC_status_page_12();
        // Danh sách tour mới nhất
        $tour = $tour->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();
        
        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour'));
    }

    public function listTour_Category(Category $category, Tour $tour, $slug, storyTour $history){
        // lấy danh mục theo slug
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return view('FEadmin.Pages.Error.error404');
        }
        $categories  = $category ->get_orderBy_ASC();
       // Danh sách tour mới nhất
        $tour = $tour->get_orderBy_ASC_status_page();
         // Danh Sách tour
        $tourlist = $tour->get_orderBy_ASC_status_where_category_page_12($objCategory->id);
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();
        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour', 'objCategory'));
    }
}
