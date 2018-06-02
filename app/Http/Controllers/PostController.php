<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Post;
use App\Studyarea;
use App\Type;
use App\Module;

class PostController extends Controller
{
    public function getview()
    {
        $id = Auth::user()->id;
        // dd ($id);
        $posts = Post::where('professor_id', $id)->get();
        $message = 'courses';
        return view('admin.listedocuments', compact('posts', 'message'));
    }

    public function getCreatePost()
    {
        $studyareas = Studyarea::all()->pluck("title", "id");
        $types = Type::all();
        $message = 'create';
        return view('admin.createdocument', compact('studyareas', 'types', 'message'));
    }
    //Ajax work
    public function getModules($id)
    {
        $modules = Module::where("studyarea_id", $id)->pluck("title", "id");
        return json_encode($modules);
    }

    public function upload(Request $request)
    {
        $user_id = Auth::user()->id;

        if ($request->hasFile('file')) {
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $fileName = time() . 'docs.' . $fileExt;
            $request->file('file')->storeAs('public/docs/', $fileName);

            $post = new Post();
            $post->title = $request['title'];
            $post->description = $request['description'];
            $post->file = $fileName;
            $post->professor_id = $user_id;
            $post->module_id = $request['module'];
            $post->type_id = $request['type'];
            $post->save();
            
            return redirect()->back()->with('info', 'Published Succed');
        }
    }
}
