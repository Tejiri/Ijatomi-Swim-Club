<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use Illuminate\Http\Request;

class EditSquadController extends Controller
{
    //
    function getEditSquad($id) {
        $squad = Squad::where("id", $id)->first();
        return view('pages.admin-coach.edit-squad', compact('squad'));
    }

    function postEditSquad(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required",
            'description' => "required",
        ]);

        Squad::where('id', $id)->update([
            // 'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->withInput()->with("success", "Squad updated successfully");
        // return $id;
        // $squad = Squad::where("id", $id)->first();
        // return view('pages.admin-coach.edit-squad',compact('squad'));
    }
}
