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

    public function create_category(CategoryRequest $req, Category $category)
    {
        /*dd($req->all());*/
        if ($category->create_category($req)) {
            return redirect()->back()->with('success', 'Tạo Danh Mục Thành Công!');
        } else {
            return redirect()->back()->with('err', 'Tạo Danh Mục Thất Bại!');
        }
    }

    public function view_update_category(Request $request, Category $category, $slug)
    {
        $obj = $category->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        return view('admin_view.pages_view.admin_proce_view.update_admin_proce', compact('obj'));
    }

    public function update_category(Request $request, Category $category, $slug)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($category, $slug) {
                    $exists = Category::where('linkText', '!=', $slug)
                        ->where('name', $value)
                        ->exists();
                    if ($exists) {
                        $fail('Trường đã tồn tại.');
                    }
                },
            ],
        ], [
            'name.required' => 'Trường Không Được Để Trống!',
        ]);

        if ($category->get_link($slug)) {
            $update = $category->update_category($request, $slug);
            if ($update > 0) {
                return redirect()->route('list_Proce')->with('success', 'Chỉnh Sủa Thành Công!');
            } else {
                return redirect()->route('list_Proce')->with('err', 'Chỉnh Sủa Thất Bại!');
            }
        }
        return view('admin_view.error.404');
    }

}
