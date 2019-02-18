<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class authdataController extends Controller
{
    public function verify_email(Request $request)
    {
       echo $request->get('email');
        return 0;
    }
}
