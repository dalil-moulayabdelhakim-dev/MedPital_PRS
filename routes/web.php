<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LaboController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes(
    //['verify' => true]
);

//home route
Route::get('/', [Controller::class, 'index'])->name('/');
//verify-email
// Route::post('/send-verification-link', [VerificationController::class, 'resend'])
//     ->middleware(['auth'])
//     ->name('verification.send');

//download app route
//clinic member registration view
Route::get('/register/clinic-member', [RegisterController::class, 'clinicMemberRegister'])->name('register.clinic.member');
//profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
//settings
Route::get('/settings', [UserController::class, 'settings'])->name('settings');

Route::group(['prefix' => 'admin'], function () {
    //add new admin
    Route::post('/user/add/admin', [AdminController::class, 'adminRegister'])->name('admin.register');
    //add new user
    Route::post('/user/add', [UserController::class, 'userRegister'])->name('user.register');
    //multi delete
    Route::post('/user/multi-delete', [AdminController::class, 'multiDelete'])->name('user.multiDelete');
    //delete user
    Route::post('/user/delete/', [AdminController::class, 'deleteUser'])->name('user.delete');

    //reject
    Route::get('/user/reject/{id}', [UserController::class, 'reject'])->name('reject');
    //accept
    Route::get('/user/accept/{id}', [UserController::class, 'accept'])->name('accept');

    Route::get('/profiles/admin/view', [AdminController::class, 'adminProfilesPage'])->name('admin.profiles.page');
    Route::get('/profiles/patient/view', [AdminController::class, 'patientProfilesPage'])->name('patient.profiles.page');
    Route::get('/profiles/laboratorian/view', [AdminController::class, 'laboratorianProfilesPage'])->name('laboratorian.profiles.page');

    Route::get('/requests/patient/view', [AdminController::class, 'patientRequestsPage'])->name('patient.requests.page');
    Route::get('/requests/laboratorian/view', [AdminController::class, 'laboratorianRequestsPage'])->name('laboratorian.requests.page');
});

Route::group(['prefix' => 'labo'], function () {
    Route::get('/view/appointment-list', [LaboController::class, 'appointmentView'])->name('labo.view.appointment');
    Route::get('/appointment/delete/{id}', [LaboController::class, 'appointmentDelete'])->name('labo.delete.appointment');
    Route::post('/appointment/edit', [LaboController::class, 'appointmentEdit'])->name('labo.edit.appointment');

    Route::get('/view/registration-list', [LaboController::class, 'requestView'])->name('labo.view.request');
    Route::get('/view/test-list', [LaboController::class, 'testListView'])->name('labo.view.testList');
    Route::get('/view/user-list', [LaboController::class, 'userListView'])->name('labo.view.userList');
    Route::get('/view/settings', [LaboController::class, 'settingsView'])->name('labo.view.settings');

    Route::post('appointment/make/patient', [LaboController::class, 'addAppointment'])->name('labo.make.app');
});



//api===============
Route::get('/api/getUserData/{id}', [UserController::class, 'getUserData']);
Route::get('/api/getAppointmentData/{id}', [LaboController::class, 'getAppointmentData']);
Route::get('/api/getRequestData/{id}', [LaboController::class, 'getRequestData']);
