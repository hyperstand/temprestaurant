<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function dashboard()
    {   
        $auth=auth()->user();

        $data=[
         'name' => ($auth->fname.' '.$auth->lname)
        ];

        return view('layouts.dashboard',['user_info' => $data]);
    }
}
