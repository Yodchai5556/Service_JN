<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class testCon extends Controller
{
    public function __construct()
	{
        //$this->middleware('jwt.verify');
       // $this->authUser = (JWTAuth::user()) ? JWTAuth::user()->user_name : $this->authUser;
    }

    public function hello(Request $request)
    {
        return "as";
    }
}