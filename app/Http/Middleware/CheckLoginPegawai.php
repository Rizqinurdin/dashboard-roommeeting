<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginPegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('id_login')) {

            if (Session::get('role') == 'pegawai') {
                $data['user'] = DB::table('users')->join('department', 'users.id_department', '=', 'department.id_department')->where('id_user', session()->get('id_login'))->first();

                view()->share($data);

                return $next($request);
            } else {

                return redirect()->route('login')->with('toast_error', 'This page can only be accessed by employee');
            }
        } else {
            return redirect()->route('login')->with('toast_error', 'Please log in first');
        }
    }
}
