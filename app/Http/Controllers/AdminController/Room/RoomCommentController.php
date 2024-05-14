<?php

namespace App\Http\Controllers\AdminController\Room;

use App\Http\Controllers\Controller;
use App\Models\CommentRoom;
use Illuminate\Http\Request;

class RoomCommentController extends Controller
{
    public function comment_room_list(CommentRoom $commentRoom)
    {
        $list = $commentRoom->get_orderBy_ASC();
        return view('FEadmin.Pages.RoomComment.view_list', compact('list'));
    }


    public function detail_comment_room(CommentRoom $commentRoom, $slug)
    {
        $objRoom = $commentRoom->get_link_slug($slug);
        return response()->json($objRoom);
    }


    //Phương thức xóa danh mục
    public function delete_comment_room(CommentRoom $room, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $room->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($room->delete_comment_room($slug) > 0) {
            return redirect()->route('comment_room_list')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('comment_room_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }
    public function update_room_comment(Request $req, CommentRoom $room, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        if ($room->update_comment_room($req, $slug) >= 0) {
            return redirect()->route('comment_room_list')->with('success', 'Cập Nhật Phản Hồi Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Phản Hồi Thất Bại!');
        }
    }

}
