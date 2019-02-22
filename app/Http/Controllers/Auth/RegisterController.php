<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;

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
  
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   


        if ($request->isMethod('post') && 
        $request->has(['data.email', 'data.password','data.fname','data.lname','data.phnnum','data.accepted']) && 
        $request->filled(['data.email', 'data.password','data.fname','data.lname','data.phnnum','data.accepted'])&& Session::token() == $request->input('crfs',null)) {
        
            if($request->input('data.accepted',null))
            {
                $stat=User::create([
                    'fname' => $request->input('data.fname',null),
                    'lname' => $request->input('data.lname',null),
                    'email' => $request->input('data.email',null),
                    'phnum' => $request->input('data.phnum',null),
                    'password' => Hash::make($request->input('data.password',null)),
                ]);
                if($stat)
                {
                    return  response()->json(array('status'=>true,'to_url'=>'dashboard'), 200);
                }else
                {
                    return  response()->json(array('status'=>false,'to_url'=>'something went wrong'), 500);
                }
                
            }else
            {
                return response()->json([
                    'status'=>false,
                    'message'=>'Atribute Not Met'
                ], 505);
            }
        
        }else
        {
            return response()->json([
                'status'=>false,
                'message'=>'connection refuse'
            ], 505);
        }


    }

}
