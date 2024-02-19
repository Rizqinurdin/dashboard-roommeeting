<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $data['active'] = 'dashboard';
        $data['countPending'] = DB::table('booking')->where('id_user', Session::get('id_login'))->where('status', 'Pending')->count();
        $data['countApproved'] = DB::table('booking')->where('id_user', Session::get('id_login'))->where('status', 'Approved')->count();
        $data['countRejected'] = DB::table('booking')->where('id_user', Session::get('id_login'))->where('status', 'Rejected')->count();


        return view('Pages.Pegawai.Dashboard.index', $data);
    }
}
