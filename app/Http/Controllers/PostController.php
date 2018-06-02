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
        return view('admin.listedocuments', ['message' => 'Courses', 'posts' => $posts]);
    }

    public function getCreatePost()
    {
        
        return view('admin.createdocument', ['message' => 'Create']);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $fileName = time().'docs.'.$fileExt;
            $request->file('file')->storeAs('public/docs/',$fileName);
            return redirect()->back()->with('info', 'Published Succed');
        }

    }


}
