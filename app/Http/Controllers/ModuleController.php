<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class ModuleController extends Controller
{
    public function addModule(Request $request)
    {   
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
}
