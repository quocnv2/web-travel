<?php

namespace App\Http\Controllers\UserController\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\createRequest;
use App\Models\CommentTour;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tour;
use App\Helper\storyTour;
use App\Models\Blog;
use App\Models\Room;
use App\Http\Requests\CommentTour\createRequestTour;

class tourController extends Controller
{
    public function listTour(Category $category, Tour $tourModel, storyTour $history, CommentTour $commentTour)
    {
        $categories = $category->get_orderBy_ASC();
        // Danh Sách tour
        $tourlist = $tourModel->get_orderBy_ASC_status_page_8();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();

        $listCommentTour = $commentTour->get_orderBy_ASC_status_page();

        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour', 'listCommentTour'));
    }

    public function listTour_Category(Category $category, Tour $tourModel, $slug, storyTour $history)
    {
        // lấy danh mục theo slug
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return redirect()->route('error404');
        }
        $categories = $category->get_orderBy_ASC();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $historyTour = $history->list_storyTour();
        // Danh Sách tour
        $tourlist = $tourModel->get_orderBy_ASC_status_where_category_page_8($objCategory->id);

        return view('Home.Layout.Pages.Tour.list_tour', compact('categories', 'tour', 'tourlist', 'historyTour', 'objCategory'));
    }

    public function detailTour(Category $category, Tour $tourModel, $slug, storyTour $history, Room $room, Blog $blogs, CommentTour $commentTour,)
    {
        $objTour = $tourModel->get_link_slug($slug);
        if (!$objTour) {
            return redirect()->route('error404');
        }
        $categories = $category->get_orderBy_ASC();
        // Danh Sách tour
        $tourlist = $tourModel->whereNotIn('id', [$objTour->id])->get();
        // $toursml = Tour::where('idCategory', $idCategory)->get();
        // Danh sách tour mới nhất
        $tour = $tourModel->get_orderBy_ASC_status_page();
        // Danh sách tour đã xem
        $history->add_storyTour($objTour);
        $historyTour = $history->list_storyTour();
        // Phòng
        $roomsiml = $room->get_orderBy_ASC_status_page();
        // Bài Viết
        $blogsiml = $blogs->get_orderBy_ASC_status_page();
        $listCommentTour = $commentTour->whereNotIn('idTour', [$objTour->id])->get();
        // function

        return view('Home.Layout.Pages.Tour.tour_details', compact('categories', 'tour', 'objTour', 'historyTour', 'tourlist', 'blogsiml', 'roomsiml', 'listCommentTour'));
    }

    public function create_comment_tour(createRequestTour $req, CommentTour $commentTour, Tour $tourModel, $slug)
    {
        $create = $commentTour->create_comment_tour($req);
        $objTour = $tourModel->get_link_slug($slug);
        if ($create) {
            return redirect()->route('create_comment_tour', ['slug' => $slug, 'tour' => $objTour])->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }
}
