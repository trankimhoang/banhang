<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('web.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // select * from admin where email = "email minh nhap vao" and password = 'pass nhao o form'
        if (Auth::guard('web')->attempt($credentials, $request->get('remember-me') ?? false)) {
            // thanh cong
            return redirect()->route('web.home');
        }

        // that bai
        return redirect()->back()->withErrors(['error_login' => __('login failed')]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('web.login');
    }
}
