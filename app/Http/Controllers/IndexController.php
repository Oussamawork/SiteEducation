<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    public function getview()
    {
        if(Auth::user()->is_admin) {
            return view('admin.index'); 
        }
        return view('partials.page_403');
    }
}
