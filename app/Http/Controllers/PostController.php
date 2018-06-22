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
    {
        $id = Auth::user()->id;
        $posts = Post::where('professor_id', $id)->latest()->paginate(6);
        $user = User::where('id', $id)->first();
        $message = 'courses';
        return view('admin.listedocuments', compact('posts', 'user', 'message'));
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

    //Ajax work for update
    public function getModulesUpd($id)
    {   
        $modules = Module::where("studyarea_id", $id)->get();
        return json_encode($modules);
    }

    public function upload(Request $request)
    {
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

    public function getDocDetails($id)
    {
        $post = Post::where('id', $id)->first();
        $posts = Post::all();
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $message = 'course details';
        return view('admin.documentdetails', compact('post', 'posts', 'user', 'message'));
    }

    public function getPDF($id)
    {
        $file = Post::where('id', $id)->value('file');
        return response()->file('storage/docs/' . $file);
        return response()->download('storage/docs/' . $file);
    }

    public function DownloadPDF($id)
    {
        $file = Post::where('id', $id)->value('file');
        return response()->download('storage/docs/' . $file);
    }

    public function DeletePost($id)
    {  
        $file = Post::where('id', $id)->value('file');
       /*  Storage::delete('storage/docs/' . $file); */
        File::delete('storage/docs/' . $file);
        $post = Post::where('id', $id)->delete();
        return back();
    }

    public function UpdatePostview($id)
    {   
        $post = Post::where('id', $id)->first();
        $studyarea_id = Module::where('id',$post->module_id)->value('studyarea_id');
        $types = Type::all();
        $studyareas = Studyarea::all()->pluck("title", "id");
        $modules = Module::all();
        $message = 'create';
        return view('admin.updatedocument', compact('post', 'types', 'studyareas', 'modules', 'message','studyarea_id'));
    }

    public function UpdatePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $post = Post::where('id', $request['id'])->first();
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->type_id = $request['type'];
        $post->save();
        return redirect()->route('admin.listedocuments');
    }

    public function getStudyareaModls(Studyarea $studyarea)
    {  
        $users = User::all();
        return view('admin.listepostsbyStud', compact('studyarea','users'));
    }

    //Search 
    public function coursesSearch(Request $request)
    {
        $id = Auth::user()->id;
        $posts = Post::searchByKeyword($request['search'])->latest()->paginate(6);
        $user = User::where('id', $id)->first();
        return view('admin.listedocuments', compact('posts','user'));
    }

    //Search posts by studyarea
    public function coursesSearchS(Request $request)
    {   
        $id = Auth::user()->id;
        $studyarea = Studyarea::where('id',$request['studyarea'])->first();
        $posts = Post::searchByKeyword($request['search'])->latest()->paginate(6);
        $users = User::all();
        return view('admin.listepostsbyStudSe', compact('posts','users','studyarea'));
    }

    //USER :: 

    public function getviewUser()
    {
        $user_id = Auth::user()->id;
        $studyarea_id = Student::where('id',$user_id)->value('studyarea_id');
        $studyarea = Studyarea::where('id',$studyarea_id)->pluck('id','title');
        $modules = Module::where('studyarea_id',$studyarea_id)->get();
        $users = User::all();
        $posts = Post::latest()->get();
        return view('user.index',compact('studyarea','modules','users','posts'));
    }
}
