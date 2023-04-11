<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Squad;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ManageChildrenAccountController extends Controller
{
    //

    function getManageChildrenAccountPage($id) {
        // $genders = Gender::all();
        // $registeredChildren = User::where('parent',auth()->user()->id)->get();

        $user = User::where('id', $id)->where('parent', auth()->user()->id)->first();
        if ($user != null) {
            return view('pages.parent.update-child-account', compact("user"));
        }
        if (auth()->user()->role == 'admin') {
            $user = User::where('id', $id)->first();
            return view('pages.parent.update-child-account', compact("user"));
        }
    }

    function getRegisterChildrenPage() {
        $genders = Gender::all();
        $registeredChildren = User::where('parent', auth()->user()->id)->get();
        return view('pages.parent.manage-children-account', compact("genders", "registeredChildren"));
    }

    function postRegisterChild(Request $request)
    {

        $request->merge([
            "role" => "swimmer",
            "parent" => auth()->user()->id
        ]);
        // return back()->withInput()->withErrors([
        //     "message" => "Role is null"
        // ]);

        $this->validate(
            $request,
            [
                "username" => "required",
                "lastname" => "required",
                "address" => "required",
                "phone_number" => "required",
                "password" => "required",
                "firstname" => "required",
                "date_of_birth" => "required",
                "postcode" => "required",
                "email" => "required",
                "gender" => "required"
            ]
        );



        $emailExists = User::where('email', $request->email)->first();
        $usernameExists = User::where('username', $request->username)->first();

        if ($emailExists != null || $usernameExists != null) {
            return back()->withInput()->withErrors([
                'userExists' => "Registration failed "  . ($emailExists != null ? "- Email taken" : "- Username taken"),
            ]);
        } else {
            // return $this->registerUser($request);
        }



        return $this->registerUser($request);
    }


    function registerUser(Request $request)
    {
        // return $request;
        $gender =  Gender::where('name', $request->gender)->first();

        $dateOfBirth = new DateTime($request->date_of_birth);
        $dateNow = new DateTime("now");
        $interval = $dateOfBirth->diff($dateNow);
        $intervalYear = $interval->y;

        if ((6 <= $intervalYear) && ($intervalYear <= 28) && $request->role == "swimmer") {
            $squadToAdd = null;
            if ((6 <= $intervalYear) && ($intervalYear <= 11)) {
                $this->$squadToAdd = Squad::find(1);
            } else if ((12 <= $intervalYear) && ($intervalYear <= 17)) {
                $this->$squadToAdd = Squad::find(2);
            } else {
                $this->$squadToAdd = Squad::find(3);
            }
            $child = new User();
            $child->username = $request->username;
            $child->first_name = $request->firstname;
            $child->last_name = $request->lastname;
            $child->address = $request->address;
            $child->phone_number = $request->phone_number;
            $child->password = $request->password;
            $child->role = $request->role;
            $child->date_of_birth = $request->date_of_birth;
            $child->postcode = $request->postcode;
            $child->email = $request->email;
            $child->gender_id = $gender->id;
            $child->squad_id = $this->$squadToAdd->id;
            $child->parent = $request->parent;
            $child->save();

            return back()->withInput()->with("success",  "User registered successfully to " . $this->$squadToAdd->name);

            // return $this->createUser($request, $gender->id, $this->$squadToAdd->id, $this->$squadToAdd->name);
        } else {
            // $errorMessage = $request->role == "coach" ? "Age requirement not met. Coach must be between 20 and 50 years old" : "Age requirement not met. Parent must be between 18 and 100 years old";
            return  back()->withInput()->withErrors([
                "errorMessgae" =>  "Age requirement not met. Swimmer must be between 6 and 28 years old"
            ]);
        }
    }
}
