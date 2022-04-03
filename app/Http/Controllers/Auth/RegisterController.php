<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Str;
use Storage;

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

    // use RegistersUsers;

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

    public function showRegister()
    {
        return view('auth.register');
    }

    // protected function validator(array $data)
    // {
    //     $message = [
    //         'password.required' => 'Silahkan isi NIK',
    //         'password.numeric' => 'NIK harus angka',
    //         'username.required' => 'Silahkan isi nama pengguna',
    //         'email.required' => 'Silahkan isi email',
    //         'email.unique' => 'Email sudah ada',
    //     ];

    //     return Validator::make($data, [
    //         'username' => ['required', 'string'],
    //         'email' => ['required', 'string', 'email', 'unique:users'],
    //         'password' => ['required', 'numeric'],
    //     ], $message);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $message = [
            'password.required' => 'Silahkan isi NIK',
            'password.numeric' => 'NIK harus angka',
            'password.unique' => 'NIK sudah ada',
            'username.required' => 'Silahkan isi nama pengguna',
            'email.required' => 'Silahkan isi email',
            'email.unique' => 'Email sudah ada',
        ];
        
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|numeric',
        ], $message);

        $config = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'remember' => Str::random(100),
        ])->get();

        Storage::put( 'config.txt', $config);
        return redirect('/login')->with('success', 'Data Berhasil Di Tambahkan!');
    }
}
