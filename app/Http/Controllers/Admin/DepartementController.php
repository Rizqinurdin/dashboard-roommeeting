<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['departments'] = Department::all();
        $data['active'] = 'departments';

        return view('Pages.Admin.Departement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['active'] = 'departments';

        return view('Pages.Admin.Departement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = $request->validate(
            [
                'department_name' => 'required',
                'department_description' => 'required',
            ],
        );

        try {

            Department::create([
                'id_department' => Department::GenerateID(),
                'department_name' => $request->department_name,
                'department_description' => $request->department_description
            ]);


            return back()->with('toast_success', 'Departement has been created');
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
                'department_name' => 'required',
                'department_description' => 'required',
            ],
        );

        try {

            Department::where('id_department', $id)->update([
                'department_name' => $request->department_name,
                'department_description' => $request->department_description
            ]);


            return back()->with('toast_success', 'Departement has been updated');
        } catch (\Throwable $th) {

            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('users')->where('id_department', $id)->exists()) {

            return back()->with('toast_error', 'User cannot be deleted');
        }
        try {

            DB::table('department')->where('id_department', $id)->delete();

            return back()->with('toast_success', 'Departement has been deleted');
        } catch (\Throwable $th) {


            return back()->with('toast_error', $th->getMessage());
        }
    }
}
