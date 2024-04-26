<?php

namespace App\Http\Controllers\AdminController\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\createRequest;
use App\Http\Requests\Blog\updateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tour;

class BlogController extends Controller
{
    public function view_list(Blog $blog)
    {
        $list = $blog->get_orderBy_ASC();
        return view('FEadmin.Pages.Blog.view_list', compact('list'));
    }

    // Phương thức chi tiết bài viết|
    public function detail_blog(Blog $blog, $slug)
    {
        $objBlog = $blog->get_link_slug($slug);
        return response()->json($objBlog);
    }

    // View thêm mới
    public function view_create(Category $category, Blog $blog, Tour $tour)
    {
        // Lấy danh sách danh muc
        $list_Category = $category->get_orderBy_ASC();
        $list_Tour = $tour->get_orderBy_ASC();
        return view('FEadmin.Pages.Blog.view_create', compact('list_Category','list_Tour'));
    }

    // Phương thức thêm mới
    public function create_blog(createRequest $req, Blog $blog, Tour $tour)
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

        $tourObj = $tour->get_link_code($req->codeTour);

        $req->merge([
            'imgBanner' => $file,
            'imageArray' => $images,
            'videoArray' => $videos,
            'nameTour' => $tourObj->name,
        ]);

        // dd($req);

        //Thực hiện thêm mới
        $create = $blog->create_blog($req);


        if ($create) {
            return redirect()->route('view_create_blog')->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_blog(Blog $blog, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $blog->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($blog->delete_blog($slug) > 0) {
            return redirect()->route('view_list_blog')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_blog')->with('err', 'Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }

    public function view_update(Blog $blog, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $blog->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Blog.view_update', compact('obj'));
    }

    public function update_blog(updateRequest $req, Blog $blog, $slug)
    {

        $obj = $blog->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        $file = '';
        if ($req->file('file')) {
            $response = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgBanner;
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


        if ($blog->update_blog($req, $slug) >= 0) {
            return redirect()->route('view_list_blog')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }
}
