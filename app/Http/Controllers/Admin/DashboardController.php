<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $data['active'] = 'dashboard';
        $data['countRoom'] = DB::table('room')->count();
        $data['countUsers'] = DB::table('users')->count();
        $data['countDepartment'] = DB::table('department')->count();
        $data['countPending'] = DB::table('booking')->where('status', 'Pending')->count();
        $data['countApproved'] = DB::table('booking')->where('status', 'Approved')->count();
        $data['countRejected'] = DB::table('booking')->where('status', 'Rejected')->count();

        $data['bookinglist'] = DB::table('booking')->join('room', 'booking.id_room', '=', 'room.id_room')->join('users', 'booking.id_user', '=', 'users.id_user')->join('department', 'booking.id_department', '=', 'department.id_department')->orderBy('booking.id_booking', 'DESC')->get();

        return view('Pages.Admin.Dashboard.index', $data);
    }
}
