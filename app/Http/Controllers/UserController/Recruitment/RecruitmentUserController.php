<?php

namespace App\Http\Controllers\UserController\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recruitment;
use App\Models\Tour;

class RecruitmentUserController extends Controller
{
    public function list_recruitment(Recruitment $recruitment, Category $category, Tour $tourModel)
    {
        $categories = $category->get_orderBy_ASC();
        $recruitment_new = $recruitment->get_orderBy_ASC_status_page();
        $recruitment_list = $recruitment->get_orderBy_ASC_status_page_8();
        $tour = $tourModel->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Recruitment.list_recruitment', compact('categories', 'recruitment_new', 'recruitment_list','tour'));
    }

    public function list_recruitment_watch(Recruitment $recruitment, Category $category,$slug)
    {
        $objCategory = $category->get_link_slug($slug);

        if (!$objCategory) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $rec_new = $recruitment->get_orderBy_ASC_status_page();

        return view('Home.Layout.Pages.Recruitment.list_recruitment', compact('categories', 'rec_new', 'objCategory'));
    }

    public function detailRecruitment(Category $category, Recruitment $recruitment, $slug, Tour $tourModel)
    {
        $objRec = $recruitment->get_link_slug($slug);
        if (!$objRec) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $rec_new = $recruitment->get_orderBy_ASC_status_page();
        $tour = $tourModel->get_orderBy_ASC_status_page();
//        $listCommentBlog = $commentBlog->where('idBlog', $objBlog->id)->orderBy('id', 'DESC')->get();
        return view('Home.Layout.Pages.Recruitment.recruitment_details', compact('categories', 'rec_new', 'objRec','tour'));
    }

}
