<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index(Request $request)
    {

        $data['active'] = 'dashboard';

        return view('Pages.Admin.Profile.index', $data);
    }



    public function setting(Request $request)
    {

        $data['active'] = 'dashboard';
        $data['departments'] = DB::table('department')->orderBy('department_name', 'asc')->get();

        return view('Pages.Admin.Profile.setting', $data);
    }


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
}
