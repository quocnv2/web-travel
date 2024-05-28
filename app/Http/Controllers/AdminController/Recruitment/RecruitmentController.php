<?php

namespace App\Http\Controllers\AdminController\Recruitment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recruitment\createRequest;
use App\Http\Requests\Recruitment\updateRequest;
use App\Models\Recruitment;
use App\Rules\Recruitment\RecruitmentRequest;

class RecruitmentController extends Controller
{
    // View danh sách
    public function view_list(Recruitment $recruitment)
    {
        $list = $recruitment->get_orderBy_ASC();
        return view('FEadmin.Pages.Recruitment.view_list', compact('list'));
    }

    // Phương thức chi tiết bài viết|
    public function detail_recruitment(Recruitment $recruitment, $slug){
        $objBlog = $recruitment -> get_link_slug($slug);
        return response()->json($objBlog);
    }

    // View thêm mới
    public function view_create()
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        return view('FEadmin.Pages.Recruitment.view_create');
    }

    // Phương thức thêm mới
    public function creater_recruitment(createRequest $req, Recruitment $recruitment)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        //Thực hiện thêm mới
        $create = $recruitment->create_recruitment($req);

        if ($create) {
            return redirect()->route('view_create_recruitment')->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_recruitment(Recruitment $recruitment, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $recruitment->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($recruitment->deleteRecruitment($slug) > 0) {
            return redirect()->route('view_list_recruitment')->with('success', 'Xóa Thành Công!');
        } else {
            return redirect()->route('view_list_recruitment')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }

    public function view_update(Recruitment $recruitment, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $recruitment->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Recruitment.view_update', compact('obj'));
    }

    public function update_recruitment(updateRequest $req, Recruitment $recruitment, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $validatedData = $req->validate([
            'slug' => [new RecruitmentRequest($slug)],
        ]);

        $obj = $recruitment->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($recruitment->update_recruitment($req, $slug) >= 0) {
            return redirect()->route('view_list_recruitment')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }
}
