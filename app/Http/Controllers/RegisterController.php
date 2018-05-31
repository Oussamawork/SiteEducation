<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
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
                        ->update(['first_name' => $request['firstname'],
                                   'last_name' => $request['lastname'],
                                   'email' => $request['email'],
                                   'password' => Hash::make($request['password'])
                        ]);
        } else {    
            User::Where('identification', $request['identification'])
                        ->update(['first_name' => $request['firstname'],
                                  'last_name' => $request['lastname'],
                                  'email' => $request['email'],
                                  'password' => Hash::make($request['password']),
                                  'is_admin' => 1
                        ]);
        }
        return view('auth.login');
    }
}
