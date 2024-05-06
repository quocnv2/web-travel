<?php

namespace App\Http\Controllers\AdminController\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\createRequest;
use App\Http\Requests\Tour\updateRequest;
use App\Models\Tour;
use App\Models\Category;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // View danh sách
    public function view_list(Tour $tour)
    {
        $list = $tour->get_orderBy_ASC();
        return view('FEadmin.Pages.Tour.view_list', compact('list'));
    }

    // Phương thức chi tiết bài viết|
    public function detail_tour(Tour $tour, $slug)
    {
        $objBlog = $tour->get_link_slug($slug);
        return response()->json($objBlog);
    }

    // View thêm mới
    public function view_create(Category $category, Tour $tour)
    {
        // Lấy danh sách danh muc
        $list_Category = $category->get_orderBy_ASC();
        return view('FEadmin.Pages.Tour.view_create', compact('list_Category'));
    }

    // Phương thức thêm mới
    public function create_tour(createRequest $req, Tour $tour)
    {
        // Xử Lý Ảnh Banner
        $file = '';
        if ($req->file('file')) {
            $response = cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath();
            $file = $response;
        }

        // Xử lý list ảnh
        $images = []; // Danh sách đường dẫn ảnh

        if ($req->hasFile('filesImage')) {
            foreach ($req->file('filesImage') as $image) {
                $response = cloudinary()->upload($image->getRealPath())->getSecurePath();
                // Tạo một mảng chứa id và link ảnh và thêm vào danh sách
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
            'imgBanner' => $file,
            'imageArray' => $images,
            'videoArray' => $videos,
        ]);

        // dd($req);

        //Thực hiện thêm mới
        $create = $tour->create_tour($req);


        if ($create) {
            return redirect()->route('view_create_tour')->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_tour(Tour $tour, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $tour->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($tour->delete_Tour($slug) > 0) {
            return redirect()->route('view_list_tour')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_tour')->with('err', 'Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }

    public function view_update(Tour $tour, Category $category, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $tour->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        // Lấy danh sách danh muc
        $list_Category = $category->get_orderBy_ASC();

        return view('FEadmin.Pages.Tour.view_update', compact('obj', 'list_Category'));
    }

    public function update_tour(updateRequest $req, Tour $tour, $slug)
    {

        $obj = $tour->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        $file = '';
        if ($req->file('file')) {
            $response = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgBanner;
            $file = $response;
        } else {
            $file = $obj->imgBanner;
        }


        // Xử lý list ảnh
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

// Sau khi có đầy đủ dữ liệu, hãy kiểm tra lại phía frontend để đảm bảo rằng ảnh và video được hiển thị chính xác.



        // Tạo Req
        $req->merge([
            'imgBanner' => $file,
            'imageArray' => $images,
            'videoArray' => $videos,
        ]);

        if ($tour->update_tour($req, $slug) >= 0) {
            return redirect()->route('view_list_tour')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }
}
