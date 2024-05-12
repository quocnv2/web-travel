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

//    public function view_update(Room $room, Category $category, $slug)
//    {
//        // if(Auth::guard('admin')->user()->decentralization == 1){
//        //     return view('FEadmin.Pages.Error.error404');
//        // }
//        $obj = $room->get_link_slug($slug);
//        if (!$obj) {
//            return view('FEadmin.Pages.Error.error404');
//        }
//
//        // Lấy danh sách danh muc
//        $list_Category = $category->get_orderBy_ASC();
//
//        return view('FEadmin.Pages.Room.view_update', compact('obj', 'list_Category'));
//    }

//    public function update_room(updateRequest $req, Room $room, $slug)
//    {
//        $validatedData = $req->validate([
//            'slug' => [new RoomRequest($slug)],
//        ]);
//
//        $validatedData = $req->validate([
//            'code' => [new codeRule($slug)],
//        ]);
//
//
//        $obj = $room->get_link_slug($slug);
//        if (!$obj) {
//            return view('FEadmin.Pages.Error.error404');
//        }
//
//        // Cập nhật hình ảnh chính
//        $file = $req->hasFile('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgRoom;
//
//        // Cập nhật mảng hình ảnh
//        $images = []; // Danh sách đường dẫn ảnh
//
//        if ($req->hasFile('filesImage')) {
//            foreach ($req->file('filesImage') as $image) {
//                $response = cloudinary()->upload($image->getRealPath())->getSecurePath();
//                $images[] = ['id' => uniqid(), 'link' => $response];
//            }
//        } else {
//            $images = is_array($obj->imageArray) ? $obj->imageArray : json_decode($obj->imageArray, true);
//        }
//
//        // Xử Lý list video
//        $videos = []; // Danh sách đường dẫn video
//        $videoUpdated = false; // Biến kiểm tra có cập nhật video mới không
//
//        if ($req->hasFile('filesVideo')) {
//            foreach ($req->file('filesVideo') as $video) {
//                $response = cloudinary()->uploadApi()->upload($video->getRealPath(), [
//                    'resource_type' => 'video',
//                    'upload_large' => true
//                ]);
//                $secureUrl = $response['secure_url'];
//                $videos[] = ['id' => uniqid(), 'link' => $secureUrl];
//                $videoUpdated = true; // Đánh dấu là có cập nhật video mới
//            }
//        } else {
//            $videos = is_array($obj->videoArray) ? $obj->videoArray : json_decode($obj->videoArray, true);
//        }
//
//        // Gộp dữ liệu đã cập nhật vào yêu cầu
//        $req->merge([
//            'imgRoom' => $file,
//            'imageArray' => $images,
//            'videoArray' => $videos,
//        ]);
//
//        if ($room->update_room($req, $slug) >= 0) {
//            return redirect()->route('view_list_room')->with('success', 'Cập Nhật Bài Viết Thành Công!');
//        } else {
//            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
//        }
//    }
}
