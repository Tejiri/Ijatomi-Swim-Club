<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    function show()
    {
        if (auth()->user() != null) {
            return redirect('/');
        }
        return view('pages.login');
    }

    function login(Request $request)
    {
        // return $request;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/');
        } else {
            return back()->withInput();
        }
    }
}
