<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use Auth;
use App\Student;
use App\User;
use App\Studyarea;

class ModuleController extends Controller
{
    public function addModule(Request $request)
    {   if(Auth::user()->is_admin) {
            $this->validate($request, [
                'title' => 'required',
                'studyarea' => 'required|numeric|exists:studyareas,id',
            ]);
            
            $module = new Module();
            $module->title = $request['title'];
            $module->studyarea_id = $request['studyarea'];
            $module->save();
            return back()->with('infoM','Success');
        }
        return view('partials.page_403');
    }

    public function getUserModules()
    {
        if(!Auth::user()->is_admin) {
            $user_id = Auth::user()->id;
            $studyarea_id = Student::where('id',$user_id)->value('studyarea_id');
            $studyarea = Studyarea::where('id',$studyarea_id)->first();
            $modules = Module::where('studyarea_id',$studyarea_id)->get();
            $users = User::all();
            return view('user.listeModules',compact('studyarea','modules','users'));
        }
        return view('partials.page_403');
    }
}
