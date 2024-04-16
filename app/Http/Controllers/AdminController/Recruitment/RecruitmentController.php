<?php

namespace App\Http\Controllers\AdminController\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    // View thêm mới
    public function view_creater(){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        return view('FEadmin.Pages.Category.view_create');
    }
}
