<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerGET()
    {
        return view('register-form');
    }

    public function loginGET()
    {
        return view('login-form');
    }
}
