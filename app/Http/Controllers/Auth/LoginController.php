<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Socialize;

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

    public function username(){
        return 'username';
    }
    
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

      protected function credentials(\Illuminate\Http\Request $request)
    {
        return ['username' => $request->username, 'password' => $request->password, 'status' => 'مفعل'];
    }

    // Microsoft login
    public function redirectToMicrosoft()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    // Microsoft callback
    public function handleMicrosoftCallback()
    {
        $user = Socialite::driver('microsoft')->stateless()->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    //Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
 
        $this->_registerOrLoginUser($user);

        //Return home after login
        return redirect()->route('home');
    }

    //Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
 
        $this->_registerOrLoginUser($user);

        //Return home after login
        return redirect()->route('home');
    }

    //Github login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    //Github callback
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
 
        $this->_registerOrLoginUser($user);

        //Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email', '=' , $data->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->username = $data->email;
            $user->email = $data->email;
            $user->provider_id = $data->provider_id;
            $user->avatar = $data->avatar;
            $user->Status = "غير مفعل";
            $user->save();
        }

        Auth::login($user);
    }
    
}