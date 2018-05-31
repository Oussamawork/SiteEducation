<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Htpp\Requests;
use Auth;

use App\User;
use App\Professor;

class LoginController extends Controller
{
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $request->has('remember'))) {
            $id = Auth::user()->id;
            if (filled(Professor::find($id))) {
                return redirect()->route('admin.home');
            } else {
                echo ('Student');
            }
        }
    }
}
