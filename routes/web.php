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

        Route::get('edit-squad/{id}', [EditSquadController::class, 'edit-squad']);
        Route::post('edit-squad/{id}', [EditSquadController::class, "postEditSquad"]);

        Route::get('/admin-register-user', [RegistrationController::class, 'getAdminRegister']);
        Route::post('/admin-register-user', [RegistrationController::class, 'postRegisterUser']);

        Route::get('create-training-session', [TrainingSessionController::class, 'getTrainingSession']);
        Route::post('create-training-session', [TrainingSessionController::class, 'postCreateTrainingSession']);

        Route::get("manage-children-account", [ManageChildrenAccountController::class, 'getRegisterChildrenPage']);
        Route::post('register-child', [ManageChildrenAccountController::class, "postRegisterChild"]);

        Route::get("update-user-account/{id}", [UpdateProfileController::class, 'getUpdateUserAccount']);
        Route::post("update-coach-squad/{id}", [UpdateProfileController::class, 'postUpdateCoachSquad']);

        Route::get('manage-coaches', function () {
            $coaches = User::where('role', 'coach')->get();
            return view('pages.admin.manage-coaches', compact('coaches'));
        });
    });

    Route::middleware(['checkIfAdminOrCoach'])->group(function () {
        Route::get('/upload-training-result', [TrainingResultController::class, "getUploadResultPage"]);
        Route::post('/upload-training-result', [TrainingResultController::class, "postAddTrainingResult"]);
    });

    Route::post("update-user-account/{id}", [UpdateProfileController::class, 'postUpdateUserAccount']);
     


    Route::get('/', [DashboardController::class, "getDashboard"]);

    Route::get('/squads', [SquadController::class, "getSquads"]);

    Route::get('/performance-history/{userId}', [PerformanceHistoryController::class, "getPerformanceHistory"]);

    Route::get('update-profile', [UpdateProfileController::class, 'getUpdateProfile']);

    Route::get('/training-schedule', function () {
        $squads = Squad::all();
        return view('pages.training-schedule', compact('squads'));
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
