<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Route;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())  {
            return redirect('/');
        }
        else {
            return view('/backend/auth/login');
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        //return $this->authenticated($request, $user);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function login1(LoginRequest $request)
    { 
        $credentials = $request->getCredentials();
        //$remember = $request->get('remember');

        if (Auth::attempt($credentials)) {
            
            //$request->authenticate();
            $request->session()->regenerate();
            
            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            Auth::login($user, $remember = true);
         
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect("login")->with('failed', trans('common.login_failed'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}
