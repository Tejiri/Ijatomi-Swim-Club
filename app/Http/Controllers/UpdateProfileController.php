<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    //

    function getUpdateProfile()
    {
        $user = auth()->user();
        $dateOfBirth = new DateTime($user->date_of_birth);
        $dateNow = new DateTime("now");
        $interval = $dateOfBirth->diff($dateNow);
        $intervalYear = $interval->y;

        // return $intervalYear;
        if ($intervalYear < 18) {
            abort(403, 'UNAUTHORIZED, ONLY PARENTS CAN UPDATE');
        }
        return view('pages.update-profile', compact('user'));
    }

    function getUpdateUserAccount($id)
    {
        $user = User::where('id', $id)->where('parent', auth()->user()->id)->first();
        if ($user != null) {
            return view('pages.parent.update-user-account', compact("user"));
        }
        if (auth()->user()->role == 'admin') {
            $user = User::where('id', $id)->first();
            // $squad = Squad::where('id', $user->squad_id)->first();
            return view('pages.parent.update-user-account', compact("user"));
        }
    }

    function postUpdateUserAccount(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                "username" => "required",
                "first_name" => "required",
                "last_name" => "required",
                "address" => "required",
                "phone_number" => "required",
            ]
        );
        User::where('id', $id)->update([
            "username" => $request->username,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "middle_name" => $request->middle_name,
            "phone_number" => $request->phone_number
        ]);
        return back()->withInput()->with("success", "Profile updated successfully");
    }

    function postUpdateCoachSquad(Request $request, $id)
    {
        // return $request;
        $selectedSquad = Squad::where("name", $request->squad)->first();
        User::where('id', $id)->update([
            "squad_id" => $selectedSquad->id,
        ]);
        return back()->withInput()->with("success", "Squad updated successfully");
    }
}
