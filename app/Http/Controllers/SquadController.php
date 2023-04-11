<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use Illuminate\Http\Request;

class SquadController extends Controller
{
    //

    function getSquads()
    {
        $developmentSquad = Squad::where("name", "Development Squad")->first();
        $intermediateSquad = Squad::where("name", "Intermediate Squad")->first();
        $performanceSquad = Squad::where("name", "Performance Squad")->first();
        return view('pages.squads', compact('developmentSquad', 'intermediateSquad', 'performanceSquad'));
    }
}
