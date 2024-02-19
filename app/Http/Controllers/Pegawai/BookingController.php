<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function booking(Request $request)
    {

        $validasi = $request->validate([
            'id_user' => 'required',
            'id_department' => 'required',
            'id_room' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'purpose' => 'required'
        ]);

        // cek booking
        if (DB::table('booking')->where('id_room', $request->id_room)->where('start_date_time', $request->start_date_time)->where('end_date_time', $request->end_date_time)->where('status', 'Approved')->exists()) {

            return back()->with('toast_error', 'Room is already booked');
        }

        try {

            Booking::create([
                'id_booking' => Booking::GenerateID(),
                'id_room' => $request->id_room,
                'id_user' => $request->id_user,
                'id_department' => $request->id_department,
                'start_date_time' => $request->start_date_time,
                'end_date_time' => $request->end_date_time,
                'purpose' => $request->purpose,
                'status' => 'Pending',
            ]);

            return back()->with('toast_success', 'Booking has been submitted, please wait for admin to approve');
        } catch (\Throwable $th) {

            return back()->with('toast_error', $th->getMessage());
        }
    }



    public function bookinglist(Request $request)
    {

        $data['bookinglist'] = DB::table('booking')->join('room', 'booking.id_room', '=', 'room.id_room')->join('users', 'booking.id_user', '=', 'users.id_user')->join('department', 'booking.id_department', '=', 'department.id_department')->where('booking.id_user', Session::get('id_login'))->orderBy('booking.id_booking', 'DESC')->get();

        $data['active'] = 'bookinglist';

        return view('Pages.Pegawai.Roommetting.list-booking', $data);
    }
}
