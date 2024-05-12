<?php

namespace App\Http\Controllers\AdminController\Tour;

use App\Http\Controllers\Controller;
use App\Models\CommentTour;
use Illuminate\Http\Request;

class TourCommentController extends Controller
{
    public function comment_tour_list(CommentTour $commentRoom)
    {
        $list = $commentRoom->get_orderBy_ASC();
        return view('FEadmin.Pages.TourComment.view_list', compact('list'));
    }


    public function detail_comment_tour(CommentTour $commentRoom, $slug)
    {
        $objRoom = $commentRoom->get_link_slug($slug);
        return response()->json($objRoom);
    }


    //Phương thức xóa danh mục
    public function delete_comment_tour(CommentTour $tour, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $tour->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($tour->delete_comment_tour($slug) > 0) {
            return redirect()->route('comment_tour_list')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('comment_tour_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }
}
