<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Squad;
use App\Models\TrainingResult;
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
            $this->$swimmers = User::orderBy('first_name', 'asc')->where('role', 'swimmer')->get();
        } else if (Auth::user()->role == 'coach' && Auth::user()->squad_id != null) {
            $this->$swimmers = User::orderBy('first_name', 'asc')->where('role', 'swimmer')->where('squad_id', Auth::user()->squad_id)->get();
        } else {
            abort(403, "UNAUTHORIZED, YOU DO NOT HAVE A SQUAD");
        }



        return view('pages.admin-coach.upload-training-result')->with("swimmers", $this->$swimmers);
    }

    function getAllTrainingResults()
    {

        $selectedSquad = null;
        $squads = Squad::all();
        // $trainingResults_50m = Result::where('result_type', 'training')->where('distance', '50m')->where('validated', 1)->get();
        // $trainingResults_100m = Result::where('result_type', 'training')->where('distance', '100m')->where('validated', 1)->get();
        // $trainingResults_200m = Result::where('result_type', 'training')->where('distance', '200m')->where('validated', 1)->get();
        // $trainingResults_400m = Result::where('result_type', 'training')->where('distance', '400m')->where('validated', 1)->get();
        // $trainingResults_800m = Result::where('result_type', 'training')->where('distance', '800m')->where('validated', 1)->get();
        // $trainingResults_1500m = Result::where('result_type', 'training')->where('distance', '1500m')->where('validated', 1)->get();
        return view('pages.all-training-results', compact('selectedSquad','squads'));
        return view('pages.all-training-results', compact('trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m'));
    }

    function postAllTrainingResults(Request $request)
    {
        return redirect('training-results/' .  $request->squad);
    }

  function  getAllTrainingResultsById($id){
    $selectedSquad = Squad::where('id', $id)->first();
    // return Squad::where('id', $id)->first()->results()->where('result_type', 'training')->get();
    // return $selectedSquad->results;
    $squads = Squad::all();
   
    $trainingResults_50m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '50m')->where('validated', 1)->get();
    $trainingResults_100m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '100m')->where('validated', 1)->get();
    $trainingResults_200m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '200m')->where('validated', 1)->get();
    $trainingResults_400m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '400m')->where('validated', 1)->get();
    $trainingResults_800m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '800m')->where('validated', 1)->get();
    $trainingResults_1500m =  Squad::where('id', $id)->first()->results()->where('result_type', 'training')->where('distance', '1500m')->where('validated', 1)->get();
    return view('pages.all-training-results', compact('selectedSquad','squads','trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m'));
 
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

        $swimmer->results()->create([
            'result_type' => 'training',
            'gala_id' => null,
            'remark' => $request->remark,
            'time_in_seconds' => $timeInSec,
            'training_date' => $request->training_date,
            'distance' => $request->distance,
            'intensity' => $request->intensity,
            'stroke_type' => $request->stroke_type,
            'validated' => Auth::user()->role  ==  "admin" ? 1 : 0,
            'squad_id' => $swimmer->squad->id
        ]);

        return back()->withInput()->with('success', "Training result successfully uploaded for " . $swimmer->first_name . " " . $swimmer->last_name);
    }

    function getValidateTrainingResults()
    {
        $trainingResults = Result::where('result_type', 'training')->where('validated', 0)->get();
        return view('pages.admin.validate-training-results', compact('trainingResults'));
    }

    function getValidateTrainingResultsWithId($id)
    {
        $trainingResult = Result::where('result_type', 'training')->where('id', $id)->where("validated", 0)->first();
        if ($trainingResult == null) {
            abort(403, "Training result not found");
        }
        return view('pages.admin.validate-training-result', compact('trainingResult'));
    }

    function postValidateTrainingResultsWithId($id)
    {
        Result::where('result_type', 'training')->where('id', $id)->first()->update([
            "validated" => 1
        ]);

        return redirect('validate-training-results');
    }

    function deleteTrainingResultWithId($id)
    {
        Result::where('result_type', 'training')->where('id', $id)->first()->delete();
        return redirect('validate-training-results');
    }
}
