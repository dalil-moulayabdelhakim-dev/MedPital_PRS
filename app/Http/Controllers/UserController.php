<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteRejectedAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::whereId($id)->first();
        if ($user->ac_status == 1) {
            return view('profile', compact('user'));
        } else if ($user->ac_status == 2) {
            $settings = [
                'title' => 'File rejected',
                'message' => 'Your file was rejected, because some information was incorrect or unclear, your account will be deleted in seconds',
            ];
            return view('auth.wait_page', compact('settings', 'user'));
        } else {

            $settings = [
                'title' => 'Signup successfully',
                'message' => "Your file in progress now, we will notify you when it's ready!",
            ];

            return view('auth.wait_page', compact('settings', 'user'));
        }
    }

    //settings
    public function settings()
    {
        $id = Auth::id();
        $user = User::whereId($id)->first();
        if ($user->ac_status == 1) {
            return view('settings', compact('user'));
        } else if ($user->ac_status == 2) {
            $settings = [
                'title' => 'File rejected',
                'message' => 'Your file was rejected, because some information was incorrect or unclear, Account will be deleted in seconds',
            ];
            return view('auth.wait_page', compact('settings', 'user'));
        } else {
            $settings = [
                'title' => 'Signup successfully',
                'message' => "Your file in progress now, we will notify you when it's ready!",
            ];
            return view('auth.wait_page', compact('settings', 'user'));
        }
    }

    public function reject($id)
    {
        try {
            $user = User::find($id);
            $user->ac_status = 2;
            $user->update();

            DeleteRejectedAccount::dispatch($id)->delay(now()->addSeconds(20));
            (new BaseController)->sendNotificationToUser($user);
            Session::flash('success',[ 'Request was rejected successfully!']);
        } catch (\Exception $e) {
            Session::flash('error', [$e->getMessage()]);
        }
        return redirect()->back();
    }

    public function accept($id)
    {
        try {
            $user = User::find($id);
            $user->ac_status = 1;
            $user->update();
            (new BaseController)->sendNotificationToUser($user);
            Session::flash('success', ['The account has been accepted successfully!']);
        } catch (\Exception $e) {
            Session::flash('error', [$e->getMessage()]);
        }
        return redirect()->back();
    }

    public function getUserData($id)
    {
        $user = User::find($id);

        return response()->json([
            'name' => $user->name,
            'id_card_number' => $user->id_card_number,
            'email' => $user->email,
            'address' => $user->address,
            'phone' => $user->phone,
            'date_of_birth' => $user->date_of_birth,
            'gender' => $user->gender,
            'file' => $user->id_card_file,
        ]);
    }



    function userRegister(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_card_number' => ['required', 'string', 'max:255', 'unique:users'],
            'id_card_file' => ['file'],
            'date_of_birth' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'user_type_id' => ['required', 'numeric'],
            'gender' => ['numeric'],
            'address' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $disk = 'public';
        if (isset($data['id_card_file']) && $data['id_card_file']->isValid()) {
            $postName = time() . "." . $data['id_card_file']->getClientOriginalExtension();
            $destination_path = "uploads/users/" . $data['id_card_number'];
            $path = $data['id_card_file']->storeAs($destination_path, $postName, $disk);
            $data['id_card_file'] = 'storage/' . $path;
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'user_type_id' => $data['user_type_id'],
            'password' => Hash::make($data['password']),
            'id_card_number' => $data['id_card_number'],
            'date_of_birth' => isset($data['date_of_birth']) ? $data['date_of_birth'] : null,
            'phone' => $data['phone'],
            'gender' => isset($data['gender']) ? $data['gender'] : null,
            'id_card_file' => isset($data['id_card_file']) ? $data['id_card_file'] : null,
            'ac_status' => 1,
        ]);

        return redirect()->back();
    }
}
