<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Professor;
use App\Student;

class RegisterController extends Controller
{

    /*use RegistersUsers;
    protected $redirectTo = '/home';*/

    public function edit(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
        if ($request['is_admin'] == null) {
            User::Where('identification', $request['identification'])
                ->update([
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password'])
                ]);
            $id = User::where('identification', $request['identification'])->value('id');
            $student = new Student();
            $student->id = $id;
            $student->studyarea_id = $request['studyarea'];
            $student->save();
        } else {
            User::Where('identification', $request['identification'])
                ->update([
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'email' => $request['email'],
                    'is_admin' => 1,
                    'password' => Hash::make($request['password'])
                ]);

            $id = User::where('identification', $request['identification'])->value('id');
            $professor = new Professor();
            $professor->id = $id;
            $professor->save();
        }
       return view('auth.login');
    }
}
