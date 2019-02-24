<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class Authenticate 
{   
    protected $auth;
    protected $restricted=['/dashboard'];
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        //check here if the user is authenticated
        // dd();

    if(in_array($request->getPathInfo(),$this->restricted))
    {
        if(!$this->auth->guest())
        {
            return $next($request);
        }else 
        {
            return redirect()->route('authentic');
        }

    }else {

        if($this->auth->guest())
        {
            return $next($request);
        }else {
            return redirect()->route('dash');
        }
    }


    
        // if ()
        // {   
           

           
        //     // dd($request->ajax());
        //     

        // }else if(  ){

            
        // }
    
        
    }


}
