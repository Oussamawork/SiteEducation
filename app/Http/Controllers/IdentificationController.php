<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Studyarea;

class IdentificationController extends Controller
{
    // Students 
    public function getview()
    {
        return view('first.identification', ['message' => 'Sign up']);
    }

    public function getIdentification(Request $request)
    {
        $this->validate($request, [
            'identification' => 'required|numeric|digits:10'
        ]);
        //  dd (filled(User::where('identification',$request['identification'])->get()));
        


        if (filled(User::where('identification', $request['identification'])->first())) {
            if (!filled(User::where('identification', $request['identification'])->value('email'))) {
                $studyareas = Studyarea::all();
                return view('auth.register', ['identification' => $request['identification'], 'studyareas' => $studyareas]);
            } else {
                return redirect()->back()->with('info', 'This CNE is already used.');
            }
        } else {
            return redirect()->back()->with(['info' => 'CNE NOT FOUND, PLEASE CONTACT YOUR PROFESSOR', 'identification' => $request['identification']]);
        }
    }

    //professors
    public function getviewP()
    {
        return view('first.identificationP');
    }

    public function getIdentificationP(Request $request)
    {
        $this->validate($request, [
            'identification' => 'required|between:1,9'
        ]);
        //  dd (filled(User::where('identification',$request['identification'])->get()));
        if (filled(User::where('identification', $request['identification'])->first())) {
            if (!filled(User::where('identification', $request['identification'])->value('email'))) {
                return view('auth.register', ['identification' => $request['identification'], 'is_admin' => 1]);            
            } else {
                return redirect()->back()->with('info', 'This CIN is already used.');
            }
        } else {
            return redirect()->back()->with(['info' => 'CNI NOT FOUND, PLEASE CONTACT THE TECHNICAL SUPPORT', 'identification' => $request['identification']]);
        }
    }
}
