<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class authdataController extends Controller
{   
    public function __construct()
    {
  
    }
    

    public function verify_email(Request $request)
    {
        if (User::where('email', '=', $request->get('email'))->count() > 0) {
            return response()->json([
                'status'=>false
            ], 500);
        }else{
            return response()->json([
                'status'=>true
            ], 200);
        }
    }

    public function verify_phnum(Request $request)
    {
        if (User::where('phnnumber', '=', $request->get('phnum'))->count() > 0) {
            return response()->json([
                'status'=>false
            ], 500);
        }else{
            return response()->json([
                'status'=>true
            ], 200);
        }
    }


}
