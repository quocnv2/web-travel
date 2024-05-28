<?php

namespace App\Http\Controllers\AdminController\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\createRequest;
use App\Http\Requests\Banner\updateRequest;
use App\Models\Banner;
use App\Rules\Banner\BannerRule;

// use Illuminate\Http\Request;

class BannerController extends Controller
{
    // View danh sách
    public function view_list(Banner $banner)
    {
        $list = $banner->get_orderBy_ASC();
        return view('FEadmin.Pages.Banner.view_list', compact('list'));
    }

    // View thêm mới
    public function view_create()
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        return view('FEadmin.Pages.Banner.view_create');
    }

    // Phương thức thêm mới
    public function create_banner(createRequest $req, Banner $banner)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $file = '';
        if ($req->file('file')) {
            $response = cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath();
            $file = $response;
        }
        $req->merge(['imgBanner' => $file]);
        //Thực hiện thêm mới
//        dd($req->all());
        $create = $banner->create_banner($req);



        if ($create) {
            return redirect()->route('view_create_banner')->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_banner(Banner $banner, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $banner->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($banner->delete_Banner($slug) > 0) {
            return redirect()->route('view_list_banner')->with('success', 'Xóa Thành Công!');
        } else {
            return redirect()->route('view_list_banner')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }

    public function view_update(Banner $banner, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $obj = $banner->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Banner.view_update', compact('obj'));
    }

    public function update_banner(updateRequest $req, Banner $banner, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $validatedData = $req->validate([
            'slug' => [new BannerRule($slug)],
        ]);

        $obj = $banner->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        $file = '';
        if ($req->file('file')) {
            $response = $req->file('file') ?  cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath() : $obj->imgBanner;
            $file = $response;
        } else {
            $file = $obj->imgBanner;
        }

        $req->merge(['imgBanner' => $file]);

        if ($banner->update_Banner($req, $slug) >= 0) {
            return redirect()->route('view_list_banner')->with('success', 'Cập Nhật Danh Mục Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Danh Mục Thất Bại!');
        }
    }
}
