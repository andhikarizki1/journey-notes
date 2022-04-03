<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginFormAdmin()
    {
        return view('auth.loginadmin');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {   
        // $input = $request->all();
        $credentials = $this->validate($request, 
        [
            // 'email' => 'required|email',
            'password' => 'required|numeric',
            'username' => 'required',
        ],
        [
            'password.required' => 'Silahkan isi NIK',
            'password.numeric' => 'NIK harus angka',
            'username.required' => 'Silahkan isi nama pengguna',
        ]);

        if (Auth::attempt($credentials))
        {
            if(auth()->user()->roles = 'user'){
                return redirect()->route('user.dash');
            }else{
                return abort(404);
            }
        }else{
            return redirect()->route('show.user')->with('error', 'Pengguna Tidak Terdaftar!');
        }
    }
}
