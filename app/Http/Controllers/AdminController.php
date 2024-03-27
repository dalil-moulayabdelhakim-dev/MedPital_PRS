<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminRegister(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_card_number' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'user_type_id' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'user_type_id' => $data['user_type_id'],
            'password' => Hash::make($data['password']),
            'id_card_number' => $data['id_card_number'],
            'phone' => $data['phone'],
            'ac_status' => 1,
        ]);

        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        (new BaseController)->sendNotificationToUser($user);
        return redirect()->back();
    }

    public function multiDelete(Request $request)
    {
        // Validate the request
        $request->validate([
            'adminIds' => 'required',
            'adminIds.*' => 'exists:users,id', // Ensure that each ID exists in the admins table
        ]);



        $adminIds = array_map('trim', explode(',', $request->adminIds));
        // Check if the array is not empty before attempting to delete
        if (!empty($adminIds)) {
            // Use Eloquent or your preferred method to delete the selected admins
            User::whereIn('id', $adminIds)->delete();
        }
        Session::flash('success', ['Operation was successfully!']);
        return redirect()->back();
    }

    public function adminProfilesPage()
    {
        $settings = $this->getCounts('2', '1');

        return view('admin.side_pages.users_profiles.admin', compact('settings'));
    }

    public function patientProfilesPage()
    {
        $settings = $this->getCounts('1 ', '1');
        return view('admin.side_pages.users_profiles.patient', compact('settings'));
    }
    public function laboratorianProfilesPage()
    {
        $settings = $this->getCounts('3', '1');
        return view('admin.side_pages.users_profiles.laboratorian', compact('settings'));
    }

    //Requests review===============================

    public function patientRequestsPage()
    {
        $settings = $this->getCounts('1', '0');
        return view('admin.side_pages.requests_review.patient', compact('settings'));
    }


    public function laboratorianRequestsPage()
    {
        $settings = $this->getCounts('3', '0');
        return view('admin.side_pages.requests_review.laboratorian', compact('settings'));
    }

    private function getCounts($type, $status)
    {
        $settings = [
            'users' => User::query()
                ->where('user_type_id', $type)
                ->where('ac_status', $status)->get(),
            'pat_req' => User::query()->where('user_type_id', '1')->where('ac_status', '0')->get()->count(),
            'lab_req' => User::query()->where('user_type_id', '3')->where('ac_status', '0')->get()->count(),
        ];
        return $settings;
    }

}
