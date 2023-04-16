<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingResultController extends Controller
{
    //


    function getUploadResultPage()
    {
        $swimmers = null;
        if (Auth::user()->role == 'admin') {
            $this->$swimmers = User::orderBy('first_name','asc')->where('role', 'swimmer')->get();
        } else if (Auth::user()->role == 'coach' && Auth::user()->squad_id != null) {
            $this->$swimmers = User::orderBy('first_name','asc')->where('role', 'swimmer')->where('squad_id', Auth::user()->squad_id)->get();
        } else {
            abort(403, "UNAUTHORIZED, YOU DO NOT HAVE A SQUAD");
        }



        return view('pages.admin-coach.upload-training-result')->with("swimmers", $this->$swimmers);
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
            'validated' => Auth::user()->role  ==  "admin" ? 1 : 0
        ]);

        return back()->withInput()->with('success', "Training result successfully uploaded for " . $swimmer->first_name . " " . $swimmer->last_name);
    }
}
