<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Institution;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function index()
    {

        $user = User::find(Auth::id());
        if (!is_null($user)) {

            if ($user->ac_status == 1) {
                if ($user->user_type_id == 2 || $user->user_type_id == 4) {
                    $settings = [
                        'total_admins' => User::query()->where('user_type_id', '2')->get()->count(),
                        'total_users' => User::query()->where('ac_status', '1')->whereNot('id', $user->id)->get()->count(),
                        'total_join_requests' => User::query()->where('ac_status', '0')->get()->count(),
                        'pat_req' => User::query()->where('user_type_id', '1')->where('ac_status', '0')->get()->count(),
                        'lab_req' => User::query()->where('user_type_id', '3')->where('ac_status', '0')->get()->count(),
                    ];
                    return view("admin.index", compact('settings', 'user'));
                } else if ($user->user_type_id == 3) {
                    $settings = [
                        'test_count' => Institution::find($user->institution_id)->analyses->count(),
                        'requests_count' => Prescription::query()->where('institution_id', $user->institution_id)->get()->count(),
                        'app_pending_count' => Appointment::query()->where('status', 0)->count(),
                        'req_approved_count' => Prescription::query()->where('status', 1)->count(),
                        'app_count' => Appointment::query()->where('institution_id', $user->institution_id)->get()->count(),
                        'test_finished' => Prescription::query()->where('institution_id', $user->institution_id)->where('status', 4)->get()->count(),
                    ];
                    return view("labo.index", compact('user', 'settings'));
                } else {
                    return view("index", compact('user'));
                }
            } else if ($user->ac_status == 2) {
                $settings = [
                    'title' => 'File rejected',
                    'message' => 'Your file was rejected, because some information was incorrect or unclear, your account will be deleted in seconds',
                ];

                return view('auth.wait_page', compact('settings'));
            } else {
                $settings = [
                    'title' => 'Signup successfully',
                    'message' => "Your file in progress now, we will notify you when it's ready!",
                ];

                return view('auth.wait_page', compact('settings'));
            }
        } else {
            return view("index", compact('user'));
        }

    }

    public function getUser()
    {
        $user = User::find(Auth::id());

        return redirect()->view('index', compact('user')); // Update the filename as needed.
    }


}
