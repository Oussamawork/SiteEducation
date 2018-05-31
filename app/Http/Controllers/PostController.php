<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Post;

class PostController extends Controller
{
    public function getview()
    {
        $id = Auth::user()->id;
        // dd ($id);
        $posts = Post::where('professor_id', $id)->get();
        return view('admin.listedocuments', ['message' =>'Courses' , 'posts' => $posts]);
    }
}
