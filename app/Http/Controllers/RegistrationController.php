<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Squad;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //

    function getRegister()
    {
        $genders = Gender::all();
        if (auth()->user() != null) {
            return redirect('/');
        }
        return view('pages.register', compact('genders'));
    }

    // function register(Request $request)
    // {

    //     $user = User::where('email', $request->email)->first();

    //     if ($user != null) {
    //         // return $user;
    //         return  $this->logUserIn($request->email, $request->password);
    //     } else {
    //         $gender =  Gender::where('name', $request->gender)->first();

    //         $dateOfBirth = new DateTime($request->date_of_birth);
    //         $dateNow = new DateTime("now");
    //         $interval = $dateOfBirth->diff($dateNow);
    //         $intervalYear = $interval->y;


    //         if ($request->disability == null && (18 <= $intervalYear) && ($intervalYear <= 25)) {
    //             $squad = Squad::where("name", "Para Swimming Squad")->first();
    //             User::create(
    //                 [
    //                     'username' => $request->username,
    //                     'first_name' => $request->first_name,
    //                     'last_name' => $request->last_name,
    //                     'date_of_birth' => $request->date_of_birth,
    //                     'address' => $request->address,
    //                     'postcode' => $request->postcode,
    //                     'phone_number' => $request->phone_number,
    //                     'email' => $request->email,
    //                     'role' => 'swimmer',
    //                     'password' => Hash::make($request->password),
    //                     'gender_id' => $gender->id,
    //                     'squad_id' => $squad->id
    //                 ]
    //             );
    //         } else if ($request->disability === "on" && (18 <= $intervalYear) && ($intervalYear <= 25)) {

    //             $squad = Squad::where("name", "Performance Squad")->first();
    //             User::create(
    //                 [
    //                     'username' => $request->username,
    //                     'first_name' => $request->first_name,
    //                     'last_name' => $request->last_name,
    //                     'date_of_birth' => $request->date_of_birth,
    //                     'address' => $request->address,
    //                     'postcode' => $request->postcode,
    //                     'phone_number' => $request->phone_number,
    //                     'email' => $request->email,
    //                     'role' => 'swimmer',
    //                     'password' => Hash::make($request->password),
    //                     'gender_id' => $gender->id,
    //                     'squad_id' => $squad->id
    //                 ]
    //             );

    //             // return $request->disability;
    //         } else {
    //             return "Age requirement not met";
    //         }

    //         return   $this->logUserIn($request->email, $request->password);
    //     }


    //     // return $interval->y;

    // }


    function getAdminRegister()
    {

        $genders = Gender::all();
        // if (auth()->user() != null) {
        //     return redirect('/');
        // }
        // $paraSquad = Squad::where("name", "Para Swimming Squad")->first();
        // $paraSwimmers = $paraSquad->users;
        // return $paraSwimmers;
        return view('pages.admin-register-user', compact('genders'));
    }

    function postRegisterUser(Request $request)
    {
        if ($request->role == null) {
            $request->merge([
                "role" => "swimmer",
            ]);
            // return back()->withInput()->withErrors([
            //     "message" => "Role is null"
            // ]);
        }
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        return $this->registerUser($request);
    }

    function registerUser(Request $request)
    {
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

            return $this->createUser($request, $gender->id, $this->$squadToAdd->id, $this->$squadToAdd->name);
        } else if ((20 <= $intervalYear) && ($intervalYear <= 50) && $request->role == "coach") {

            return $this->createUser($request, $gender->id, null, null);
        } else if ((18 <= $intervalYear) && ($intervalYear <= 100) && $request->role == "parent") {

            return $this->createUser($request, $gender->id, null, null);
        } else {
            $errorMessage = $request->role == "coach" ? "Age requirement not met. Coach must be between 20 and 50 years old" : "Age requirement not met. Parent must be between 18 and 100 years old";
            return  back()->withInput()->withErrors([
                "errorMessgae" =>   $request->role == "swimmer" ? "Age requirement not met. Swimmer must be between 6 and 28 years old" : $errorMessage
            ]);
        }
    }


    function createUser(Request $request, $genderId, $squadId, $squadName)
    {

        User::create(
            [
                'username' => $request->username,
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
                'gender_id' => $genderId,
                'squad_id' => $request->role == "swimmer" ? $squadId : null
            ]
        );

        return back()->withInput()->with("success", $request->role == "swimmer" ? "User registered successfully to " . $squadName : "User registered successfully");
    }


    function logUserIn($email, $password)
    {
        if (auth()->attempt([
            'email' => $email,
            'password' => $password
        ])) {
            // $user = auth()->user();
            return redirect('/',);
        } else {
            return back()->withInput();
        }
    }
}
