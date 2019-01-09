<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_member()
    {
        return view('myna.auth.member_login');
    }

    public function authenticate_member(Request $request)
    {
        $credentials = $request->only('soeid');
        $member = User::where('soeid', $credentials['soeid'])->first();
        if ($member) {
          // Authentication passed...
          Auth::login($member);
          return redirect()->intended('/');
        }
        return redirect()->back()->withErrors('Wrong SOEID');
    }

    public function authenticate_admin(Request $request)
    {
        $credentials = $request->only(['email','password']);
        if (Auth::attempt($credentials)) {
          // Authentication passed...
          return redirect('admin/');
        }
        return redirect()->back()->withErrors('Wrong email or password');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
