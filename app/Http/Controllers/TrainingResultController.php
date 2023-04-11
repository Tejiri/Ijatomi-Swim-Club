<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TrainingResultController extends Controller
{
    //


    function getUploadResultPage()
    {
        $swimmers = User::where('role', 'swimmer')->get();
        // if (condition) {
        //     # code...
        // }
        // auth()->logout();
        // return $day;
        // $squad = Squad::where('name', $squadName)->first();
        // $trainingSession = TrainingSession::where('squad_id', $squad->id)->where('day', $day)->first();
        // return $trainingSessions;
        return view('pages.upload-training-result', compact('swimmers'));
    }

    function postAddTrainingResult(Request $request)
    {
        $timeInSec = 0;

        $this->validate($request, [
            "swimmer" => 'required',
            "training_date" => 'required',
            "remark" => 'required',
            "intensity" => 'required',
            "distance" => 'required',
            "stroke_type" => 'required',
        ]);

     

        if ($request->h != null) {
            # code...
            $timeInSec = $request->h * 60;
        }
        if ($request->m != null) {
            $timeInSec = $request->m + $timeInSec;
        }
        $timeInSec = ($timeInSec * 60) + $request->s;

        $swimmer = User::where('id', $request->swimmer)->where('role', 'swimmer')->first();

        $swimmer->trainingResults()->create([
            'remark' => $request->remark,
            'time_in_seconds' => $timeInSec,
            'training_date' => $request->training_date,
            'distance' => $request->distance,
            'intensity' => $request->intensity,
            'stroke_type' => $request->stroke_type,
        ]);

        return back()->withInput()->with('success', "Training result successfully uploaded for " . $swimmer->first_name . " " . $swimmer->last_name);
        // return $swimmer->trainingResults;
        // auth()->logout();
        // return $day;
        // $squad = Squad::where('name',$squadName)->first();
        // $trainingSession = TrainingSession::where('squad_id',$squad->id)->where('day',$day)->first();
        // return $trainingSessions;
        // return $request;
        // return view('pages.upload-training-result', compact('squad', 'trainingSession'));
    }
}
