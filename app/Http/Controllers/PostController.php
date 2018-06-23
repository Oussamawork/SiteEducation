<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Auth;

use App\Post;
use App\Studyarea;
use App\Type;
use App\Module;
use App\User;
use App\Professor;
use App\Student;

class PostController extends Controller
{
    public function getview()
    {   if(Auth::user()->is_admin) {
            $id = Auth::user()->id;
            $posts = Post::where('professor_id', $id)->latest()->paginate(6);
            $user = User::where('id', $id)->first();
            $message = 'courses';
            return view('admin.listedocuments', compact('posts', 'user', 'message'));
        }
        return view('partials.page_403');
    }

    public function getCreatePost()
    {
        if(Auth::user()->is_admin) {
            $studyareas = Studyarea::all()->pluck("title", "id");
            $types = Type::all();
            return view('admin.createdocument', compact('studyareas', 'types'));
        }
        return view('partials.page_403');
    }

    //Ajax work
    public function getModules($id)
    {
        $modules = Module::where("studyarea_id", $id)->pluck("title", "id");
        return json_encode($modules);
    }

    //Ajax work for update
    public function getModulesUpd($id)
    {   
        $modules = Module::where("studyarea_id", $id)->get();
        return json_encode($modules);
    }

    public function upload(Request $request)
    {   if(Auth::user()->is_admin) {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required|string',
                'studyarea' => 'required|numeric|exists:studyareas,id',
                'module' => 'required|numeric|exists:modules,id',
                'type' => 'required|numeric|exists:types,id',
                'file' => 'required|max:10240'
            ]);
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
                
                return redirect()->back()->with(['info' => 'Published Succed']);
            }
            return redirect()->back()->with('info', 'No File detected');
        }
        return view('partials.page_403');
    }

    public function getPDF($id)
    {   if(Auth::user()->is_admin) {
            $file = Post::where('id', $id)->value('file');
            return response()->file('storage/docs/' . $file);
            return response()->download('storage/docs/' . $file);
        }
        return view('partials.page_403');
    }

    public function DownloadPDF($id)
    {
        if(Auth::user()->is_admin) {
            $file = Post::where('id', $id)->value('file');
            return response()->download('storage/docs/' . $file);
        }
        return view('partials.page_403');
    }

    public function DeletePost($id)
    {  
        if(Auth::user()->is_admin) {
            $file = Post::where('id', $id)->value('file');
            File::delete('storage/docs/' . $file);
            $post = Post::where('id', $id)->delete();
            return back();
        }
        return view('partials.page_403');
    }

    public function UpdatePostview($id)
    {   
        if(Auth::user()->is_admin) {
            $post = Post::where('id', $id)->first();
            $studyarea_id = Module::where('id',$post->module_id)->value('studyarea_id');
            $types = Type::all();
            $studyareas = Studyarea::all()->pluck("title", "id");
            $modules = Module::where('studyarea_id',$studyarea_id)->get();
            return view('admin.updatedocument', compact('post', 'types', 'studyareas', 'modules','studyarea_id'));
        }
        return view('partials.page_403');
    }

    public function UpdatePost(Request $request)
    {
        if(Auth::user()->is_admin) {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'type' => 'required',
                'studyarea' => 'required', 
                'module' => 'required'
            ]);
            $post = Post::where('id', $request['id'])->first();
            $post->title = $request['title'];
            $post->description = $request['description'];
            $post->module_id = $request['module'];
            $post->type_id = $request['type'];
            $post->save();
            return redirect()->route('admin.listedocuments');
        }
        return view('partials.page_403');
    }

    public function getStudyareaModls(Studyarea $studyarea)
    {  
        if(Auth::user()->is_admin) {
            $users = User::all();
            return view('admin.listepostsbyStud', compact('studyarea','users'));
        }
        return view('partials.page_403');
    }

    //Search 
    public function coursesSearch(Request $request)
    {
        if(Auth::user()->is_admin) {
            if(!empty($request['search'])) {
                $id = Auth::user()->id;
                $posts = Post::searchByKeyword($request['search'])->latest()->paginate(12);
                $user = User::where('id', $id)->first();
                return view('admin.listedocuments', compact('posts','user'));
            }
            return back();
        }
        return view('partials.page_403');
    }

    //Search posts by studyarea
    public function coursesSearchS(Request $request)
    {   
        if(Auth::user()->is_admin) {
            if(!empty($request['search'])) {
                $studyarea = Studyarea::where('id',$request['studyarea'])->first();
                $posts = Post::searchByKeyword($request['search'])->latest()->get();
                $users = User::all();
                return view('admin.listepostsbyStudSe', compact('posts','users','studyarea'));
            }
            return back();
        }
        return view('partials.page_403');
    }
    
    //USER :: 
    public function getviewUser($id)
    {
        if(!Auth::user()->is_admin) {
            $user_id = Auth::user()->id;
            $studyarea_id = Student::where('id',$user_id)->value('studyarea_id');
            $studyarea = Studyarea::where('id',$studyarea_id)->value('title');
            $module = Module::where('id',$id)->first();
            $users = User::all();
            $posts = Post::where('module_id',$id)->latest()->paginate(6);
            return view('user.index',compact('studyarea','module','users','posts'));
        }
        return view('partials.page_403');
    }

    //Search
    public function coursesSearchUser(Request $request)
    {
        if(!Auth::user()->is_admin) {
            if(!empty($request['search'])) {
                $id = Auth::user()->id;
                $posts = Post::searchByKeyword($request['search'])->latest()->paginate(12);
                $users = User::all();
                $module_id = $request['module'];
                $module = Module::where('id',$module_id)->first();
                return view('user.index', compact('posts','users','module'))->with('module',$module);
            }
            return back();
        }
        return view('partials.page_403');
    }
}