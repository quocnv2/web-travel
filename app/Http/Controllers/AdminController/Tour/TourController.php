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
    public function detail_tour(Tour $tour, $slug){
        $objBlog = $tour -> get_link_slug($slug);
        return response()->json($objBlog);
    }

    // View thêm mới
    public function view_create(Category $category)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
//      Lấy danh sách danh muc
        $list_Category = $category -> get_orderBy_ASC();
        return view('FEadmin.Pages.Tour.view_create' , compact('list_Category'));
    }

    // Phương thức thêm mới
    public function create_tour(createRequest $req, Tour $tour)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

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

        if ($tour->deleteTour($slug) > 0) {
            return redirect()->route('view_list_tour')->with('success', 'Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_tour')->with('err', 'Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }

    public function view_update(Tour $tour, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $tour->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Tour.view_update', compact('obj'));
    }

    public function update_tour(updateRequest $req, Tour $tour, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
//        $validatedData = $req->validate([
//            'slug' => [new CategoriesRule($slug)],
//        ]);

        $obj = $tour->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($tour->update_tour($req, $slug) >= 0) {
            return redirect()->route('view_list_tour')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }
}
