<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studyarea;
use Auth;

class StudyareaController extends Controller
{
    public function viewaddStudyarea()
    {   
        if(Auth::user()->is_admin) {
            $studyareas = Studyarea::all();
            return view('admin.AddStudyarea', compact('studyareas'));
        }
        return view('partials.page_403');
    } 

    public function addStudyarea(Request $request)
    {
        if(Auth::user()->is_admin) {
            $this->validate($request, [
                'title' => 'required'
            ]);
            $studyarea = new Studyarea();
            $studyarea->title = $request['title'];
            $studyarea->save();

            return back()->with('info','Success');
        }
        return view('partials.page_403');
    } 
}
