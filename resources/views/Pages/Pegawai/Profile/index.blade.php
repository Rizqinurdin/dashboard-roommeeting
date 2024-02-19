@extends('Layouts.Pegawai.main')

@section('content')
    <div class="mt-3 d-flex justify-content-center align-items-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Profile</h6>
                <div class="mt-4">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item bg-secondary text-white">Email : {{ $user->email }}</li>
                        <li class="list-group-item bg-secondary text-white">Departement : {{ $user->department_name }}</li>
                        <li class="list-group-item bg-secondary text-white">Name : {{ $user->name }}</li>
                        <li class="list-group-item bg-secondary text-white">Gender : {{ $user->gender }}</li>
                        <li class="list-group-item bg-secondary text-white">Address : {{ $user->address }}</li>
                        <li class="list-group-item bg-secondary text-white">Phone Number : {{ $user->phone_number }}</li>
                        <li class="list-group-item bg-secondary text-white">Place Of Birth : {{ $user->place_of_birth }}
                        <li class="list-group-item bg-secondary text-white">Date Of Birth : {{ $user->date_of_birth }}
                        <li class="list-group-item bg-secondary text-white">Role : {{ $user->role }}
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
