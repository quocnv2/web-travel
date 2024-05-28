<?php

namespace App\Http\Controllers\UserController\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CommentRecruitment;
use App\Models\Recruitment;

class RecruitmentUserController extends Controller
{
    public function list_recruitment(Recruitment $recruitment,Category $category)
    {
        $categories = $category->get_orderBy_ASC();
        $recruitment_new = $recruitment->get_orderBy_ASC_status_page();
        $recruitment_list = $recruitment->get_orderBy_ASC_status_page_8();
        return view('Home.Layout.Pages.Recruitment.list_recruitment', compact('categories','recruitment_new', 'recruitment_list'));
    }

    public function listBlog_Category(Category $category, Blog $blog, $slug)
    {
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_where_category_page_8($objCategory->id);
        return view('Home.Layout.Pages.Blog.list_blog', compact('categories', 'blog_new', 'blog_list', 'objCategory'));
    }

    public function detailRecruitment(Category $category, Recruitment $recruitment, $slug)
    {
        $objRec = $recruitment->get_link_slug($slug);
        if (!$objRec) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $rec_new = $recruitment->get_orderBy_ASC_status_page();
//        $listCommentBlog = $commentBlog->where('idBlog', $objBlog->id)->orderBy('id', 'DESC')->get();
        return view('Home.Layout.Pages.Recruitment.recruitment_details', compact('categories', 'rec_new', 'objRec'));
    }

}
