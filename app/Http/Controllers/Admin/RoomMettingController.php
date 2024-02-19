<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RoomMettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['rooms'] = Room::all();
        $data['active'] = 'rooms';

        return view('Pages.Admin.Room.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['active'] = 'rooms';

        return view('Pages.Admin.Room.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = $request->validate(
            [
                'room_name' => 'required',
                'location_room' => 'required',
                'room_capacity' => 'required',
                'image_room' => 'required',
            ],
        );

        if ($request->file('image_room')) {
            $file = $request->file('image_room');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/room'), $filename);
            $filename = 'upload/room/' . $filename;
        } else {
            return back()->with('toast_error', 'Image not found');
        }

        try {


            Room::create([
                'id_room' => Room::GenerateID(),
                'room_name' => $request->room_name,
                'location_room' => $request->location_room,
                'room_capacity' => $request->room_capacity,
                'image_room' => $filename,
            ]);


            return back()->with('toast_success', 'Room has been created');
        } catch (\Throwable $th) {

            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate(
            [
                'room_name' => 'required',
                'location_room' => 'required',
                'room_capacity' => 'required',
            ],
        );

        if ($request->file('image_room')) {
            $file = $request->file('image_room');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/room'), $filename);
            $filename = 'upload/room/' . $filename;
        } else {

            $filename = $request->image_room_old;
        }


        try {

            Room::where('id_room', $id)->update([
                'room_name' => $request->room_name,
                'location_room' => $request->location_room,
                'room_capacity' => $request->room_capacity,
                'image_room' => $filename,
            ]);


            return back()->with('toast_success', 'Room has been updated');
        } catch (\Throwable $th) {

            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('booking')->where('id_room', $id)->exists()) {

            return back()->with('toast_error', 'booking cannot be deleted');
        }
        try {

            DB::table('room')->where('id_room', $id)->delete();

            return back()->with('toast_success', 'Room has been deleted');
        } catch (\Throwable $th) {


            return back()->with('toast_error', $th->getMessage());
        }
    }
}
