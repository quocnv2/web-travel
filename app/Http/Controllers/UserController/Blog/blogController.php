<?php

namespace App\Http\Controllers\UserController\Blog;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function listBlog(Category $category, Blog $blog){
        $categories  = $category ->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_page_8();
        return view('Home.Layout.Pages.Blog.list_blog', compact('categories', 'blog_new', 'blog_list'));
    }

    public function listBlog_Category(Category $category, Blog $blog, $slug){
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return view('FEadmin.Pages.Error.error404');
        }

        $categories  = $category ->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_where_category_page_8($objCategory->id);
        return view('Home.Layout.Pages.Blog.list_blog', compact('categories', 'blog_new', 'blog_list', 'objCategory'));
    }

    public function detailBlog(Category $category, Blog $blog, $slug){
        $objBlog = $blog->get_link_slug($slug);
        if (!$objBlog) {
            return view('FEadmin.Pages.Error.error404');
        }

        $categories  = $category ->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Blog.blog_details', compact('categories', 'blog_new', 'objBlog'));
    }

}
