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
     * This method overrides the default laravel method to show the registration form.
     * The purpose is so that a guest cannot create an admin account and mess with the system.
     * I couldn't think of any better approach than this.
     * 
     * To enable this feature, just comment or delete it.
     * For security reason, do not enable it if the code is in production.
     */
    // public function showRegistrationForm()
    // {
    //     return redirect('/404');
    // }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/species';

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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'username' => $data['username'],
        //     'password' => bcrypt($data['password']),
        // ]);
        throw new Exception('Registration not possible');
    }

    public function showRegistrationForm()
    {
        return abort('404');
    }

    public function register() {
        return abort('404');
    }
}
