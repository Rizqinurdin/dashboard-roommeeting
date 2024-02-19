<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{


    public function index(Request $request)
    {

        return view('Pages.Auth.login');
    }



    public function login(Request $request)
    {


        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        if (auth()->attempt($validasi)) {

            if (auth()->user()->role == 'admin') {

                Session::put([
                    'id_login' => auth()->user()->id_user,
                    'role' => auth()->user()->role
                ]);
                return redirect()->route('dashboard.admin')->with('toast_success', 'Welcome admin');
            } else if (auth()->user()->role == 'pegawai') {

                Session::put([
                    'id_login' => auth()->user()->id_user,
                    'role' => auth()->user()->role
                ]);

                return redirect()->route('dashboard.pegawai')->with('toast_success', 'Welcome employees');
            } else {

                return redirect()->back()->with('toast_error', 'Your account is not registered in the role system, please contact our admin');
            }
        } else {
            return redirect()->back()->with('toast_error', 'The account you entered is not registered, please register first');
        }
    }
}
