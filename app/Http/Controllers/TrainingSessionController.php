<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    //

    function getTrainingSchedule()
    {
        $squads = Squad::all();
        return view('pages.training-schedule', compact('squads'));
    }

    function getTrainingSession()
    {
        $squads = Squad::all();
        return view('pages.admin.create-training-session', compact('squads'));
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


    function getUpdateTrainingSession($id)
    {
        // $squads = Squad::all();
        $trainingSession = TrainingSession::where('id', $id)->first();
        return view('pages.admin-coach.update-training-schedule', compact('trainingSession'));
    }

    function deleteTrainingSession($id)
    {
        TrainingSession::where('id', $id)->first()->delete();
        return redirect('training-schedule');
    }


    function putUpdateTrainingSession(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'intensity' => 'required',
            'distance' => 'required',
            'stroke_type' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        TrainingSession::where('id', $id)->first()->update([
            'name' => $request->name,
            'description' =>  $request->description,
            'intensity' =>  $request->intensity,
            'distance' =>  $request->distance,
            'stroke_type' =>  $request->stroke_type,
            'start_time' =>  $request->start_time,
            'end_time' =>  $request->end_time,
        ]);
        return back()->with('success', 'Training Session updated successfully');
        // return $trainingSession->squad;
        // return $request;
    }
}
