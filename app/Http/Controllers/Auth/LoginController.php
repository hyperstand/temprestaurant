<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Session;

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
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');

        
    }

    public function login(Request $request)
    {   

        if ($request->isMethod('post') && 
            $request->has(['data.email', 'data.password','data.rememberme']) && 
            $request->filled(['data.email', 'data.password','data.rememberme'])&& Session::token() ==$request->input('crfs',null)) {

            $userdata = array(
                'email'     => $request->input('data.email',null),
                'password'  => $request->input('data.password',null)
            );
            

            // echo Auth::user();
            // attempt to do the login
            if (Auth::attempt($userdata)) {
                
                return  response()->json(array('status'=>true,'to_url'=>'dashboard'), 200);

            }else
            {
                return response()->json(array('status'=>false,'message'=>'email or password incorect'), 200);
            }
            

        }else{
            return response()->json([
                'status'=>false,
                'message'=>'connection refuse'
            ], 505);
        }
        
        
    }

}
