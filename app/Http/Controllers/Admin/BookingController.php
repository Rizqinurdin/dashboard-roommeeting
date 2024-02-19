<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookinglist(Request $request)
    {

        $data['bookinglist'] = DB::table('booking')->join('room', 'booking.id_room', '=', 'room.id_room')->join('users', 'booking.id_user', '=', 'users.id_user')->join('department', 'booking.id_department', '=', 'department.id_department')->orderBy('booking.id_booking', 'DESC')->get();

        $data['active'] = 'bookinglist';

        return view('Pages.Admin.Booking.index', $data);
    }


    public function approved(Request $request, $id_booking)
    {

        $dataOld = DB::table('booking')->where('id_booking', $id_booking)->first();

        try {

            if (DB::table('booking')->where('id_room', $dataOld->id_room)->where('start_date_time', $dataOld->start_date_time)->where('end_date_time', $dataOld->end_date_time)->where('status', 'Approved')->exists()) {

                return back()->with('toast_error', 'Room is already booked');
            }

            Booking::where('id_booking', $id_booking)->update([
                'status' => 'Approved'
            ]);

            return redirect()->back()->with('toast_success', 'Booking has been approved');
        } catch (\Throwable $th) {

            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }


    public function rejected(Request $request, $id_booking)
    {

        try {

            Booking::where('id_booking', $id_booking)->update([
                'status' => 'Rejected'
            ]);

            return redirect()->back()->with('toast_success', 'Booking has been rejected');
        } catch (\Throwable $th) {

            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }



    public function searchDate(Request $request)
    {


        $data['bookinglist'] = DB::table('booking')->join('room', 'booking.id_room', '=', 'room.id_room')->join('users', 'booking.id_user', '=', 'users.id_user')->join('department', 'booking.id_department', '=', 'department.id_department')->whereDate('booking.start_date_time', '>=', $request->start_date_time)->whereDate('booking.end_date_time', '<=', $request->end_date_time)->orderBy('booking.id_booking', 'DESC')->get();

        $data['active'] = 'bookinglist';
        $data['print'] = 'print';
        $data['start_date_time'] = $request->start_date_time;
        $data['end_date_time'] = $request->end_date_time;


        return view('Pages.Admin.Booking.index', $data);
    }


    public function report_pdf($start_date_time, $end_date_time)
    {

        $data['bookinglist'] = DB::table('booking')->join('room', 'booking.id_room', '=', 'room.id_room')->join('users', 'booking.id_user', '=', 'users.id_user')->join('department', 'booking.id_department', '=', 'department.id_department')->whereDate('booking.start_date_time', '>=', $start_date_time)->whereDate('booking.end_date_time', '<=', $end_date_time)->orderBy('booking.id_booking', 'DESC')->get();

        $data['start_date_time'] = $start_date_time;
        $data['end_date_time'] = $end_date_time;

        $pdf = Pdf::loadView('Pages.Admin.Booking.report_pdf', $data);

        return $pdf->stream('report_booking_roommetting_' . $start_date_time . '-' . $end_date_time . '.pdf');
    }
}
