<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Institution;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LaboController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function appointmentView()
    {
        $user = User::find(Auth::id());
        $app = Appointment::query()->where('institution_id', $user->institution_id)->whereNot('status', 4)->whereNot('status', 5)->get();

        $settings = [
            'app' => $app,
            'app_count' => $app->count(),
            'requests_count' => Prescription::query()->where('institution_id', $user->institution_id)->get()->count(),
            'tests' => $user->institution->analyses,
        ];
        return view('labo.side_pages.appointment', compact('user', 'settings'));
    }

    public function requestView()
    {
        $user = User::find(Auth::id());
        $req = Prescription::query()->where('institution_id', $user->institution_id)->whereNot('status', 4)->whereNot('status', 5)->get();
        $settings = [
            'request' => $req,
            'requests_count' => $req->count(),
            'app_count' => Appointment::query()->where('institution_id', $user->institution_id)->get()->count(),

        ];
        return view('labo.side_pages.request', compact('user', 'settings'));
    }

    public function testListView()
    {
        $user = User::find(Auth::id());
        $inst = $user->institution;
        $analyses = $inst->analyses()->withPivot('cost')->get();

        $tests = $inst->analyses()->withPivot('cost')->get();
        $settings = [
            'requests_count' => Prescription::query()->where('institution_id', $user->institutio_id)->get()->count(),
            'app_count' => Appointment::query()->where('institution_id', $user->institution_id)->get()->count(),
            'tests' => $tests,

        ];
        return view('labo.side_pages.testList', compact('user', 'settings'));
    }

    public function userListView()
    {
        $user = User::find(Auth::id());
        $settings = [
            'requests_count' => Prescription::query()->where('institution_id', $user->institutio_id)->get()->count(),
            'app_count' => Appointment::query()->where('institution_id', $user->institution_id)->get()->count(),

        ];
        return view('labo.side_pages.userList', compact('user', 'settings'));
    }

    public function settingsView()
    {
        $user = User::find(Auth::id());
        $settings = [
            'requests_count' => Prescription::query()->where('institution_id', $user->institutio_id)->get()->count(),
            'app_count' => Appointment::query()->where('institution_id', $user->institution_id)->get()->count(),

        ];
        return view('labo.side_pages.settings', compact('user', 'settings'));
    }

    public function getAppointmentData($id)
    {
        $user = Auth::user();
        $app = Appointment::find($id);
        $inst = Institution::query()->where('id', $user->institution_id)->first();

        return response()->json([
            'appointment' => $app,
            'patient' => $app->patient,
            'prescription' => $app->prescription,
            'institution' => $app->institution,
            'analyses' => $app->prescription->analyses,
            'status' => $app->status,
            'tests' => $inst->analyses,
        ]);


    }

    public function getRequestData($id)
    {
        $req = Prescription::find($id);

        return response()->json([
            'prescription_id' => $req->id,
            'patient' => $req->patient,
            'doctor' => $req->doctor,
            'analyses' => $req->analyses,
            'institution' => $req->institution,
            'status' => $req->status,
        ]);
    }

    public function addAppointment(Request $request)
    {
        try {
            $data = $request->all();
            $data['status'] = 0;
            Appointment::create($data);
            $pres = Prescription::find($data['prescription_id']);
            $pres->update(['status'=>1]);

            return redirect()->back()->with('success', ['The appointment created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 200);

        }

    }

    public function appointmentDelete($id)
    {
        try {
            Appointment::find($id)->delete();
            return redirect()->back()->with('success', ['Appointment has been deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function appointmentEdit(Request $request)
    {
        try {
            $app = Appointment::find($request->id);
            $app->schedule = $request->schedule;
            $app->status = isset($request->status)? $request->status: 0;
            $app->save();

            $pres = Prescription::find($app->prescription_id);
            $pres->status = isset($request->status)? $request->status: 1;
            $pres->save();
            Session::flash('success', ['the informations was edited successfully!']);
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', [$e->getMessage()]);
            return redirect()->back();
        }
    }
}
