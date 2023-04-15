<?php

namespace App\Http\Controllers;

use App\Models\TrainingResult;
use App\Models\User;
use Illuminate\Http\Request;

class PerformanceHistoryController extends Controller
{
    //

    function getPerformanceHistory($userId) {
        $user = User::where('id', $userId)->first();
        $trainingResults_50m = TrainingResult::where('user_id', $userId)->where('distance', '50m')->where('validated',1)->get();
        $trainingResults_100m = TrainingResult::where('user_id', $userId)->where('distance', '100m')->where('validated',1)->get();
        $trainingResults_200m = TrainingResult::where('user_id', $userId)->where('distance', '200m')->where('validated',1)->get();
        $trainingResults_400m = TrainingResult::where('user_id', $userId)->where('distance', '400m')->where('validated',1)->get();
        $trainingResults_800m = TrainingResult::where('user_id', $userId)->where('distance', '800m')->where('validated',1)->get();
        $trainingResults_1500m = TrainingResult::where('user_id', $userId)->where('distance', '1500m')->where('validated',1)->get();
        return view('pages.performance-history', compact('trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m', 'user'));
    }
}
