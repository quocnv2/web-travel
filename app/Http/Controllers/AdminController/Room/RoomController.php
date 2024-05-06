<?php

namespace App\Http\Controllers\AdminController\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\createRequest;
use App\Http\Requests\Room\updateRequest;
use App\Models\Category;
use App\Models\Room;
use App\Rules\Room\RoomRequest;

class RoomController extends Controller
{
    public function view_list(Room $room)
    {
        $list = $room->get_orderBy_ASC();
        return view('FEadmin.Pages.Room.view_list', compact('list'));
    }


    public function detail_room(Room $room, $slug)
    {
        $objRoom = $room->get_link_slug($slug);
        return response()->json($objRoom);
    }

    // View thêm mới
    public function view_create(Category $category, Room $room)
    {
        $list_Category = $category->get_orderBy_ASC();
        return view('FEadmin.Pages.Room.view_create', compact('list_Category'));
    }

    public function create_room(createRequest $req, Room $room)
    {
        $file = '';
        if ($req->file('file')) {
            $response = cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath();
            $file = $response;
        }

        $images = [];

        if ($req->hasFile('filesImage')) {
            foreach ($req->file('filesImage') as $image) {
                $response = cloudinary()->upload($image->getRealPath())->getSecurePath();
                $images[] = ['id' => uniqid(), 'link' => $response];
            }
        }

        // Xử Lý list video
        $videos = []; // Danh sách đường dẫn video

        if ($req->hasFile('filesVideo')) {
            foreach ($req->file('filesVideo') as $video) {
                $response = cloudinary()->uploadApi()->upload($video->getRealPath(), [
                    'resource_type' => 'video',
                    'upload_large' => true
                ]);

                // Get secure URL
                $secureUrl = $response['secure_url'];
                $videos[] = ['id' => uniqid(), 'link' => $secureUrl];
            }
        }

        // Tạo Req
        $req->merge([
            'imgRoom' => $file,
            'imageArray' => $images,
            'videoArray' => $videos,
        ]);

        // dd($req);

        //Thực hiện thêm mới
        $create = $room->create_room($req);


        if ($create) {
            return redirect()->route('view_create_room')->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_room(Room $room, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $room->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($room->delete_Room($slug) > 0) {
            return redirect()->route('view_list_room')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_room')->with('err', 'Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }

    public function view_update(Room $room, Category $category, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $room->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        // Lấy danh sách danh muc
        $list_Category = $category->get_orderBy_ASC();

        return view('FEadmin.Pages.Room.view_update', compact('obj', 'list_Category'));
    }

//    public function update_room(updateRequest $req, Room $room, $slug)
//    {
//
//        $obj = $room->get_link_slug($slug);
//        $originalImgRoom = $req->imgRoom;
//        $originalImageArray = $req->imageArray;
//        $originalVideoArray = $req->videoArray;
//        if (!$obj) {
//            return view('FEadmin.Pages.Error.error404');
//        }
//        $file = '';
//        if ($req->file('file')) {
//            $response = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgRoom;
//            $file = $response;
//        } else {
//            $file = $originalImgRoom;
//        }
//
//        // Xử lý list ảnh
//        $images = []; // Danh sách đường dẫn ảnh
//
//        if ($req->hasFile('filesImage')) {
//            foreach ($req->file('filesImage') as $image) {
//                $response = cloudinary()->upload($image->getRealPath())->getSecurePath();
//                // Tạo một mảng chứa id và link ảnh và thêm vào danh sách
//                $images[] = ['id' => uniqid(), 'link' => $response];
//            }
//        } else {
//            $images = $originalImageArray;
//        }
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
//            }
//            $videoUpdated = true; // Đánh dấu là có cập nhật video mới
//        } else {
//            // Gán giá trị mảng rỗng nếu không có video mới và không có video cũ
//            $videos = $originalVideoArray ; // Đảm bảo nó là mảng
//        }
//
//        // Tạo Req
//        $req->merge([
//            'imgRoom' => $file,
//            'imageArray' => $images,
//            'videoArray' => $videos,
//        ]);
//
//
//        if ($room->update_room($req, $slug) >= 0) {
//            return redirect()->route('view_list_room',['videoArray' => $videos])->with('success', 'Cập Nhật Bài Viết Thành Công!',);
//        } else {
//            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
//        }
//    }
    //
    public function update_room(updateRequest $req, Room $room, $slug)
    {
        $validatedData = $req->validate([
            'slug' => [new RoomRequest($slug)],
        ]);
        $obj = $room->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        // Cập nhật hình ảnh chính
        $file = $req->hasFile('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgRoom;

        // Cập nhật mảng hình ảnh
        $images = []; // Danh sách đường dẫn ảnh

        if ($req->hasFile('filesImage')) {
            foreach ($req->file('filesImage') as $image) {
                $response = cloudinary()->upload($image->getRealPath())->getSecurePath();
                $images[] = ['id' => uniqid(), 'link' => $response];
            }
        } else {
            $images = is_array($obj->imageArray) ? $obj->imageArray : json_decode($obj->imageArray, true);
        }

// Xử Lý list video
        $videos = []; // Danh sách đường dẫn video
        $videoUpdated = false; // Biến kiểm tra có cập nhật video mới không

        if ($req->hasFile('filesVideo')) {
            foreach ($req->file('filesVideo') as $video) {
                $response = cloudinary()->uploadApi()->upload($video->getRealPath(), [
                    'resource_type' => 'video',
                    'upload_large' => true
                ]);
                $secureUrl = $response['secure_url'];
                $videos[] = ['id' => uniqid(), 'link' => $secureUrl];
                $videoUpdated = true; // Đánh dấu là có cập nhật video mới
            }
        } else {
            $videos = is_array($obj->videoArray) ? $obj->videoArray : json_decode($obj->videoArray, true);
        }

        // Gộp dữ liệu đã cập nhật vào yêu cầu
        $req->merge([
            'imgRoom' => $file,
            'imageArray' => $images,
            'videoArray' => $videos,
        ]);

        if ($room->update_room($req, $slug) >= 0) {
            return redirect()->route('view_list_room')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }


}
