<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'imie' => 'required|max:255',
            'nazwisko' => 'required|max:255',
            'email' => 'required|email|max:255|unique:osoba',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        return User::create([
//            'imie' => $data['imie'],
//            'nazwisko' => $data['nazwisko'],
//            'name' => $data['imie'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
        $user = new \App\User();
        $user->imie = $data['imie'];
        $user->nazwisko = $data['nazwisko'];
        $user->name = $data['imie'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        $user->roles()->attach(1);

        return $user;
    }
}
