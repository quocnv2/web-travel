<?php

namespace App\Http\Controllers\UserController\Room;

use App\Helper\storyRoom;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRoom\createRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommentRoom;
use App\Models\Room;
use App\Models\Tour;
use Illuminate\Http\Request;

class roomController extends Controller
{
    public function listRoom(Category $category, Room $room)
    {
        $categories = $category->get_orderBy_ASC();
        $room_new = $room->get_orderBy_ASC_status_page();
        $room_list = $room->get_orderBy_ASC_status_page_8();
        return view('Home.Layout.Pages.Room.list_room', compact('categories', 'room_new', 'room_list'));
    }

    public function listRoom_Category(Category $category, Room $room, $slug)
    {
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $room_new = $room->get_orderBy_ASC_status_page();
        $room_list = $room->get_orderBy_ASC_status_where_category_page_8($objCategory->id);
        return view('Home.Layout.Pages.Room.list_room', compact('categories', 'room_new', 'room_list', 'objCategory'));
    }

    public function detailRoom(Category $category, Room $room, storyRoom $storyRoom, Blog $blog, Tour $tour, CommentRoom $commentRoom, $slug)
    {
        $objRoom = $room->get_link_slug($slug);
        if (!$objRoom) {
            return redirect()->route('error404');
        }
        $categories = $category->get_orderBy_ASC();
        $room_list = $room->get_orderBy_ASC_status_page_12();
        $room_new = $room->get_orderBy_ASC_status_page();
        $storyRoom->add_storyRoom($objRoom);
        $historyRoom = $storyRoom->list_storyRoom();
        // tour
        $tour_list = $tour->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $listCommentRoom = $commentRoom->where('idRoom', $objRoom->id)->orderBy('id', 'DESC')->get();
        return view('Home.Layout.Pages.Room.room_details', compact('categories', 'room_new', 'objRoom', 'room_list', 'listCommentRoom', 'historyRoom', 'tour_list', 'blog_list'));
    }

    public function create_comment_room(createRequest $req, CommentRoom $commentRoom, Room $room, $slug)
    {
        $create = $commentRoom->create_comment_room($req);
        $objRoom = $room->get_link_slug($slug);
//        dd($req->all());


        if ($create) {
            return redirect()->route('create_comment_room', ['slug' => $slug, 'room' => $objRoom])->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

}
