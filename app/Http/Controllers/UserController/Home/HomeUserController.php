<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index(){
        return view('Home.master');
    }
}
