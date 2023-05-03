<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CoachManagementController extends Controller
{
    //
    function getCoachManagementPage() {
        $coaches = User::where('role', 'coach')->get();
        return view('pages.admin.manage-coaches', compact('coaches'));
    }
}
