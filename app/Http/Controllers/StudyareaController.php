<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studyarea;

class StudyareaController extends Controller
{
    public function viewaddStudyarea()
    {   
        $studyareas = Studyarea::all();

        return view('admin.AddStudyarea', compact('studyareas'));
    } 

    public function addStudyarea(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $studyarea = new Studyarea();
        $studyarea->title = $request['title'];
        $studyarea->save();

        return back()->with('info','Success');
    } 
}
