<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    //

    function getUpdateProfile() {
        $user = auth()->user();
        $dateOfBirth = new DateTime($user->date_of_birth);
        $dateNow = new DateTime("now");
        $interval = $dateOfBirth->diff($dateNow);
        $intervalYear = $interval->y;

        if ($intervalYear < 18) {
            abort(401, 'Unauthorized');
        }
        return view('pages.update-profile', compact('user'));
    }

    function postUpdateUserProfile(Request $request)
    {

        // return $request;
     

        $this->validate(
            $request,
            [
                "username" => "required",
                "first_name" => "required",
                "last_name" => "required",
                "date_of_birth" => "required",
                "address" => "required",
                "phone_number" => "required",
            ]
        );
        User::where('email',$request->email)-> update([
            "username" => $request->username,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "date_of_birth" => $request->date_of_birth,
            "address" => $request->address,
            "middle_name" => $request->middle_name,
            "phone_number" => $request->phone_number
        ]);
        return back()->withInput()->with("success", "Profile updated successfully");
    }
}
