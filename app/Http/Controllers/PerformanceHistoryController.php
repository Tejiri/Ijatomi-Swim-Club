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
        $trainingResults_50m = TrainingResult::where('user_id', $userId)->where('distance', '50m')->get();
        $trainingResults_100m = TrainingResult::where('user_id', $userId)->where('distance', '100m')->get();
        $trainingResults_200m = TrainingResult::where('user_id', $userId)->where('distance', '200m')->get();
        $trainingResults_400m = TrainingResult::where('user_id', $userId)->where('distance', '400m')->get();
        $trainingResults_800m = TrainingResult::where('user_id', $userId)->where('distance', '800m')->get();
        $trainingResults_1500m = TrainingResult::where('user_id', $userId)->where('distance', '1500m')->get();
        return view('pages.performance-history', compact('trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m', 'user'));
    }
}
