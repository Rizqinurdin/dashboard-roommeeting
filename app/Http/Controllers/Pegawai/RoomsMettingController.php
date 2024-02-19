<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsMettingController extends Controller
{


    public function index(Request $request)
    {

        $data['active'] = 'rooms';
        $data['rooms'] = DB::table('room')->orderBy('room_name', 'ASC')->get();


        return view('Pages.Pegawai.Roommetting.index', $data);
    }
}
