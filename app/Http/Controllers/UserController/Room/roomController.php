<?php

namespace App\Http\Controllers\UserController\Room;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Room;

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

    public function detailRoom(Category $category, Room $room, $slug)
    {
        $objRoom = $room->get_link_slug($slug);
        if (!$objRoom) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $room_new = $room->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Room.room_details', compact('categories', 'room_new', 'objRoom'));
    }

}
