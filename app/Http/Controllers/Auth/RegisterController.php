<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $disk = 'public';
        if (isset($data['id_card_file']) && $data['id_card_file']->isValid()) {
            $postName = time() . "." . $data['id_card_file']->getClientOriginalExtension();
            $destination_path = "uploads/users/" . $data['id_card_number'];
            $path = $data['id_card_file']->storeAs($destination_path, $postName, $disk);
            $data['id_card_file'] = 'storage/' . $path;
        }

        $result = User::create([
            'name' => $data['name'],
            'email' =>$data['email'],
            'address' => $data['address'],
            'user_type_id' => $data['user_type_id'],
            'password' => Hash::make($data['password']),
            'id_card_number' => $data['id_card_number'],
            'date_of_birth' => isset($data['date_of_birth'])? $data['date_of_birth']: null,
            'phone' => $data['phone'],
            'gender' => isset($data['gender'])? $data['gender']: null,
            'id_card_file' => isset($data['id_card_file'])? $data['id_card_file']: null,
            'ac_status' => 0,
        ]);

        $user = User::query()->where('email', $data['email'])->first();
        (new BaseController)->sendNotificationToUser($user);
        return $result;
    }



    public function adminRegister(HttpRequest $request){
        $data = $request->all();
        dd($data);
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_card_number' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'user_type_id' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255']
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'user_type_id' => $data['user_type_id'],
            'password' => Hash::make($data['password']),
            'id_card_number' => $data['id_card_number'],
            'phone' => $data['phone'],
        ]);
        return view('admin.side_pages.users_profiles.admin');
    }
    public function clinicMemberRegister()
    {
        $user_type = UserType::all();
        $specialties = Specialty::all();

        return view('auth.CMRegister', compact('user_type', 'specialties'));
    }
}
