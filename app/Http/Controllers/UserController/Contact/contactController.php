<?php

namespace App\Http\Controllers\UserController\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\createRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Tour;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contact_web(Category $category, Blog $blog, Contact $contact){
        $categories = $category->get_orderBy_ASC();
        $blog_list = $blog->get_orderBy_ASC_status_page();
        $contact_list = $contact->get_orderBy_ASC_status_page();
        return view('Home.Layout.Pages.Contact.contact',compact('categories', 'blog_list', 'contact_list'));
    }
    public function create_contact(createRequest $req, Contact $contact){
        //Thực hiện thêm mới
        $create = $contact -> create_contact($req);

        if ($create) {
            return redirect() -> route('create_contact')->with('success', 'Gửi Thông Tin Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Gửi Thông Tin Thất Bại!');
        }
    }
    public function view_list(Contact $contact){
        $list = $contact -> get_orderBy_ASC();
        return view('FEadmin.Pages.Contact.view_list', compact('list'));
    }




}
