<?php

namespace App\Http\Controllers\UserController\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tour;
use App\Helper\storyTour;

class tourController extends Controller
{
    public function listTour(Category $category, Tour $tourModel, storyTour $history){
        $categories  = $category ->get_orderBy_ASC();
        // Danh Sách tour
        $tourlist = $tourModel->get_orderBy_ASC_status_page_12();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();

        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour'));
    }

    public function listTour_Category(Category $category, Tour $tourModel, $slug, storyTour $history){
        // lấy danh mục theo slug
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return redirect()->route('error404');
        }
        $categories  = $category ->get_orderBy_ASC();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();
        // Danh Sách tour
        $tourlist = $tourModel->get_orderBy_ASC_status_where_category_page_12($objCategory->id);

        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour', 'objCategory'));
    }
    public function detailTour(Category $category, Tour $tourModel, $slug,storyTour $history)
    {
        $objTour = $tourModel->get_link_slug($slug);
        if (!$objTour) {
            return redirect()->route('error404');
        }
        $categories  = $category ->get_orderBy_ASC();
        // Danh Sách tour
        $tourlist = $tourModel->get_orderBy_ASC_status_page_12();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();

        return view('Home.Layout.Pages.Tour.tour_details', compact('categories', 'tour', 'objTour', 'historyTour', 'tourlist'));
    }
}
