<?php

namespace App\Http\Controllers\AdminController\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAdviseController extends Controller
{
    public function customer_list(Customer $customer)
    {
        $list = $customer->get_orderBy_ASC();
        return view('FEadmin.Pages.Customer.cus_list', compact('list'));
    }

    public function detail_customer(Customer $customer, $slug)
    {
        $obj = $customer->get_link_slug($slug);
        return response()->json($obj);
    }

    public function update_customer(Request $req, Customer $customer, $slug)
    {

        if ($customer->update_customer($req, $slug) >= 0) {
            return redirect()->route('customer_list')->with('success', 'Cập Nhật Thành Công!');
        } else {
            return redirect()->back()->with('error', 'Cập Nhật Thất Bại!');
        }
    }


    public function delete_customer(Customer $customer, $slug)
    {
        $obj = $customer->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($customer->delete_customer($slug) > 0) {
            return redirect()->route('customer_list')->with('success', 'Xóa Thành Công!');
        } else {
            return redirect()->route('customer_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }
}
