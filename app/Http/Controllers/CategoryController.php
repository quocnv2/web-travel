<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Category $category)
    {
        $listCategory = $category->get_orderBy_ASC();
        return view('category', compact('listCategory'));
    }

    public function category_cre()
    {
        return view('admin_view.Pages.Category.category');
    }

    public function create_category(CategoryRequest $req, Category $category){
        /*dd($req->all());*/
        if ($category->create_category($req)) {
            return redirect() -> back()->with('success','Tạo Danh Mục Thành Công!');
        }else{
            return redirect() -> back()->with('err','Tạo Danh Mục Thất Bại!');
        }
    }

}
