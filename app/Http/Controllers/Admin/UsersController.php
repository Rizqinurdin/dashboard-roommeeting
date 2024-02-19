<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['users'] = DB::table('users')->join('department', 'users.id_department', '=', 'department.id_department')->get();
        $data['active'] = 'users';
        $data['departments'] = DB::table('department')->orderBy('department_name', 'asc')->get();

        return view('Pages.Admin.User.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['active'] = 'users';
        $data['departments'] = DB::table('department')->orderBy('department_name', 'asc')->get();

        return view('Pages.Admin.User.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = $request->validate(
            [
                'id_department' => 'required',
                'email' => 'required',
                'password' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'role' => 'required',
            ],
        );

        if (DB::table('users')->where('email', $request->email)->exists()) {

            return back()->with('toast_error', 'Email already exists');
        }

        try {

            User::create([
                'id_user' => User::GenerateID(),
                'id_department' => $request->id_department,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'role' => $request->role,
            ]);


            return back()->with('toast_success', ' User has been created');
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
                'id_department' => 'required',
                'email' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'role' => 'required',
            ],
        );

        if ($request->password != null) {
            $password = Hash::make($request->password);
        } else {
            $password = $request->old_password;
        }

        try {

            User::where('id_user', $id)->update([
                'id_department' => $request->id_department,
                'email' => $request->email,
                'password' => $password,
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'role' => $request->role,
            ]);


            return back()->with('toast_success', 'User has been updated');
        } catch (\Throwable $th) {

            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('booking')->where('id_user', $id)->exists()) {

            return back()->with('toast_error', 'User cannot be deleted');
        }
        try {

            DB::table('users')->where('id_user', $id)->delete();

            return back()->with('toast_success', 'User has been deleted');
        } catch (\Throwable $th) {


            return back()->with('toast_error', $th->getMessage());
        }
    }
}
