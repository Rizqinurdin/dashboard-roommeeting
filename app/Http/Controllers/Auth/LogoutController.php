<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout()
    {

        Session::forget('id_login');
        Session::remove('id_login');
        auth()->logout();


        return redirect()->route('login')->with('toast_success', 'You have logged out');
    }
}
