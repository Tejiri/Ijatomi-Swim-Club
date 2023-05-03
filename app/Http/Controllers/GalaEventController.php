<?php

namespace App\Http\Controllers;

use App\Models\GalaEvent;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class GalaEventController extends Controller
{
    //

    function getAllGalaResultsPage()
    {
        // $swimmers = User::orderBy('first_name', 'asc')->where('role', 'swimmer')->get();
        $events = GalaEvent::all();
        $selectedEvent = null;
        return view('pages.all-gala-results', compact('events', 'selectedEvent'));
    }

    function postAllGalaResults(Request $request)
    {
        return redirect('gala-results/' .  $request->event);
    }

    function getAllGalaResultsPageById($galaId)
    {
        $trainingResults_50m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '50m')->where('validated', 1)->get();
        $trainingResults_100m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '100m')->where('validated', 1)->get();
        $trainingResults_200m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '200m')->where('validated', 1)->get();
        $trainingResults_400m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '400m')->where('validated', 1)->get();
        $trainingResults_800m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '800m')->where('validated', 1)->get();
        $trainingResults_1500m = Result::where('result_type', 'gala')->where('gala_id', $galaId)->where('distance', '1500m')->where('validated', 1)->get();

        // $swimmers = User::orderBy('first_name', 'asc')->where('role', 'swimmer')->get();
        $events = GalaEvent::all();
        $selectedEvent = GalaEvent::where('id', $galaId)->first();
        return view('pages.all-gala-results', compact('events', 'selectedEvent', 'trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m'));
    }



    function getGalaEventManagementPage()
    {
        $swimmers = User::orderBy('first_name', 'asc')->where('role', 'swimmer')->get();
        $events = GalaEvent::all();
        return view('pages.admin.gala-event-management', compact('swimmers', 'events'));
    }
    function createEvent(Request $request)
    {

        $this->validate($request, [
            "name" => 'required|unique:gala_events,name',
            "description" => 'required',
            "location" => 'required',
            "date" => 'required|after:today',
            "start_time" => 'required',
            "end_time" => 'required',
        ]);

        GalaEvent::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return back()->withInput()->with('success', "Event has been created  successfully");
    }

    function postAddGalaResult(Request $request)
    {
        $timeInSec = 0;

        $this->validate($request, [
            "event" => 'required',
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
            'result_type' => 'gala',
            'gala_id' => $request->event,
            'remark' => $request->remark,
            'time_in_seconds' => $timeInSec,
            'training_date' => $request->training_date,
            'distance' => $request->distance,
            'intensity' => $request->intensity,
            'stroke_type' => $request->stroke_type,
            'validated' => 1,
            'squad_id' => $swimmer->squad->id
        ]);

        return back()->withInput()->with('success', "Gala Event result successfully uploaded for " . $swimmer->first_name . " " . $swimmer->last_name);
    }
}
