<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getview()
    {
        $id = Auth::user()->id;
        // dd ($id);
        $posts = Post::where('user_id', $id)->get();
        return view('admin.listecourses', ['message' =>'Courses' , 'posts' => $posts]);
    }
}
