<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';
    protected $locale;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->locale = LaravelLocalization::setLocale() ? "/" . LaravelLocalization::setLocale() : "";
    }

    public function showLoginForm()
    {
        return view('auth.login')
            ->with('locale', $this->locale);
    }

    public function redirectTo()
    {
        return $this->locale . $this->redirectTo;
    }

    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->locale =  $request["language"];
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
}
