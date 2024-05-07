<?php

namespace App\Http\Controllers\UserController\Contact;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contact_web(Category $category, Blog $blog){
        $categories = $category->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Contact.contact',compact('categories', 'blog_list'));
    }



}
