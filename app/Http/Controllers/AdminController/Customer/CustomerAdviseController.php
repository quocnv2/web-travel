<?php

namespace App\Http\Controllers\AdminController\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAdviseController extends Controller
{
    public function customer_list(Customer $customer){
        $list = $customer -> get_orderBy_ASC();
        return view('FEadmin.Pages.Customer.cus_list', compact('list'));
    }
}
