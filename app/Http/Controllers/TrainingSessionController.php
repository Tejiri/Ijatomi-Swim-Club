<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    //

    function getTrainingSession() {
        $squads = Squad::all();
        return view('pages.create-training-session', compact('squads'));
    }

    function postCreateTrainingSession(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'intensity' => 'required',
            'distance' => 'required',
            'day' => 'required',
            'stroke_type' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'squad' => 'required',
        ]);

        $squadId = Squad::where('name', $request->squad)->first()->id;
        $exists = TrainingSession::where('day', $request->day)->where('squad_id', $squadId)->first();

        if ($exists == null) {
            TrainingSession::create([
                'name' => $request->name,
                'description' => $request->description,
                'intensity' => $request->intensity,
                'distance' => $request->distance,
                'day' => $request->day,
                'stroke_type' => $request->stroke_type,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'squad_id' => $squadId,
            ]);
            return back()->withInput()->with("success", "Training session successfully created for "  . $request->squad . " on " . $request->day);
        } else {
            return back()->withInput()->withErrors(
                [
                    "error" => "Training already scheduled  for " . $request->squad . " on " . $request->day
                ]
            );
        }
    }
}
