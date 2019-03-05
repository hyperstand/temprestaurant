<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{   
    protected $auth;
    public function dashboard()
    {   
        $auth=auth()->user();

        $data=[
         'name' => ($auth->fname.' '.$auth->lname)
        ];

        return view('layouts.dashboard',['user_info' => $data]);
    }

    public function user_info(Request $request)
    {
        $auth=auth()->user();
        

        
    }
}
