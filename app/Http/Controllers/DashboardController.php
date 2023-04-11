<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function getDashboard() {
        $developmentSquad = Squad::where("name", "Development Squad")->first();
        $intermediateSquad = Squad::where("name", "Intermediate Squad")->first();
        $performanceSquad = Squad::where("name", "Performance Squad")->first();
        return view('pages.dashboard', compact("developmentSquad", "intermediateSquad", "performanceSquad"));
    }
}
