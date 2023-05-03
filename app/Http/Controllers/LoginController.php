<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
