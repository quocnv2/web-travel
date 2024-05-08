<?php

namespace App\Http\Controllers\AdminController\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;


class ContactAdminController extends Controller
{
    public function contact_list(Contact $contact){
        $list = $contact -> get_orderBy_ASC();
        return view('FEadmin.Pages.Contact.view_list', compact('list'));
    }
    public function detail_contact(Contact $contact, $slug){
        $objBlog = $contact -> get_link_slug($slug);
        return response()->json($objBlog);
    }

    public function delete_contact(Contact $contact, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $contact->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($contact->deleteContact($slug) > 0) {
            return redirect()->route('contact_list')->with('success', 'Xóa Thành Công!');
        } else {
            return redirect()->route('contact_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }




}
