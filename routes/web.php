<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditSquadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageChildrenAccountController;
use App\Http\Controllers\PerformanceHistoryController;
use App\Http\Controllers\PopulateDatabase;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\TrainingResultController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\UpdateProfileController;
use App\Models\Gender;
use App\Models\Squad;
use App\Models\TrainingResult;
use App\Models\TrainingSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/populate', [PopulateDatabase::class, "populate"]);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['checkIfAdmin'])->group(function () {
        Route::get('/admin-register-user', [RegistrationController::class, 'getAdminRegister']);
        Route::post('/admin-register-user', [RegistrationController::class, 'postRegisterUser']);

        Route::get('create-training-session', [TrainingSessionController::class, 'getTrainingSession']);
        Route::post('create-training-session', [TrainingSessionController::class, 'postCreateTrainingSession']);

       
        Route::get("update-user-account/{id}", [UpdateProfileController::class, 'getUpdateUserAccount']);
        Route::post("update-coach-squad/{id}", [UpdateProfileController::class, 'postUpdateCoachSquad']);

        Route::get('manage-coaches', function () {
            $coaches = User::where('role', 'coach')->get();
            return view('pages.admin.manage-coaches', compact('coaches'));
        });

        Route::get('validate-training-results', function () {
            $trainingResults = TrainingResult::where('validated', 0)->get();
            return view('pages.admin.validate-training-results', compact('trainingResults'));
        });
        Route::get('validate-training-result/{id}', function ($id) {
            $trainingResult = TrainingResult::where('id', $id)->where("validated", 0)->first();
            if ($trainingResult == null) {
                abort(403, "Training result not found");
            }
            return view('pages.admin.validate-training-result', compact('trainingResult'));
        });

        Route::post('validate-training-result/{id}', function ($id) {
            TrainingResult::where('id', $id)->first()->update([
                "validated" => 1
            ]);

            return redirect('validate-training-results');
        });

        Route::post('decline-training-result/{id}', function ($id) {
            TrainingResult::where('id', $id)->first()->delete();

            return redirect('validate-training-results');
        });
    });

    Route::middleware(['checkIfAdminOrCoach'])->group(function () {
        Route::get('edit-squad/{id}', [EditSquadController::class, 'getEditSquad']);
        Route::post('edit-squad/{id}', [EditSquadController::class, "postEditSquad"]);

        Route::get('/upload-training-result', [TrainingResultController::class, "getUploadResultPage"]);
        Route::post('/upload-training-result', [TrainingResultController::class, "postAddTrainingResult"]);
    });


    Route::get("manage-children-account", [ManageChildrenAccountController::class, 'getRegisterChildrenPage']);
    Route::post('register-child', [ManageChildrenAccountController::class, "postRegisterChild"]);

    Route::post("update-user-account/{id}", [UpdateProfileController::class, 'postUpdateUserAccount']);



    Route::get('/', [DashboardController::class, "getDashboard"]);

    Route::get('/squads', [SquadController::class, "getSquads"]);

    Route::get('/performance-history/{userId}', [PerformanceHistoryController::class, "getPerformanceHistory"]);

    Route::get('update-profile', [UpdateProfileController::class, 'getUpdateProfile']);

    Route::get('/training-schedule', function () {
        $squads = Squad::all();
        return view('pages.training-schedule', compact('squads'));
    });

    Route::get('/update-training-session/{id}', function ($id) {
        // $squads = Squad::all();
        $trainingSession = TrainingSession::where('id', $id)->first();
        return view('pages.admin-coach.update-training-schedule', compact('trainingSession'));
    });

    Route::post('/update-training-session/{id}', [TrainingSessionController::class, 'putUpdateTrainingSession']);

    Route::get('training-results', function () {
        // $trainingResults = TrainingResult::all();
        $trainingResults_50m = TrainingResult::where('distance', '50m')->where('validated', 1)->get();
        $trainingResults_100m = TrainingResult::where('distance', '100m')->where('validated', 1)->get();
        $trainingResults_200m = TrainingResult::where('distance', '200m')->where('validated', 1)->get();
        $trainingResults_400m = TrainingResult::where('distance', '400m')->where('validated', 1)->get();
        $trainingResults_800m = TrainingResult::where('distance', '800m')->where('validated', 1)->get();
        $trainingResults_1500m = TrainingResult::where('distance', '1500m')->where('validated', 1)->get();

        return view('pages.all-training-results', compact('trainingResults_50m', 'trainingResults_100m', 'trainingResults_200m', 'trainingResults_400m', 'trainingResults_800m', 'trainingResults_1500m'));
    });
});

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegistrationController::class, 'getRegister']);
Route::post('/register', [RegistrationController::class, 'postRegisterUser']);

Route::get('/logout', function () {
    auth()->logout();
    return redirect('login');
});
