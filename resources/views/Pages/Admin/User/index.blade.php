@extends('Layouts.Admin.main')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end p-4 mt-4">
            <a href="{{ route('users.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="card p-4 mt-1 bg-secondary">
            <h3 class="card-title" style="">Users</h3>
            <div class="card-body table-responsive">
                <table id="table-users" class="table table-hover table-bordered" style="width: 100%;  ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Place Of Birth</th>
                            <th class="text-center">Date Of Birth</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">__Options__</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->department_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->place_of_birth }}</td>
                                <td>{{ $data->date_of_birth }}</td>
                                <td>{{ $data->role }}</td>
                                <td class=" d-flex justify-content-center gap-3">
                                    <form action="{{ route('users.destroy', $data->id_user) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?') "><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $data->id_user }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $data->id_user }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update User
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('users.update', $data->id_user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body p-4">
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="id_department"
                                                                    class="form-label">Department</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="id_department" id="id_department"
                                                                    class="form-control @error('id_department') is-invalid @enderror"
                                                                    required>
                                                                    <option value="">Pilih</option>
                                                                    @foreach ($departments as $dataD)
                                                                        <option value="{{ $dataD->id_department }}"
                                                                            @selected($dataD->id_department == $data->id_department)>
                                                                            {{ $dataD->department_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="email" class="form-label">Email</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="email" name="email" id="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Enter Email"
                                                                    value="{{ $data->email ?? old('email') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="password" class="form-label">New
                                                                    Password</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="hidden" name="old_password" id="old_password"
                                                                    value="{{ $data->password }}">
                                                                <input type="password" name="password" id="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    placeholder="Enter password"
                                                                    value="{{ old('password') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="name" class="form-label">Name</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    placeholder="Enter name"
                                                                    value="{{ $data->name ?? old('name') }}" required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="gender" class="form-label">Gender</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="gender" id="gender"
                                                                    class="form-control @error('gender') is-invalid @enderror"
                                                                    required>
                                                                    <option value="">Pilih</option>
                                                                    <option value="L" @selected($data->gender == 'L')>L
                                                                    </option>
                                                                    <option value="P" @selected($data->gender == 'P')>P
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="address" class="form-label">Address</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="address" id="address"
                                                                    class="form-control @error('address') is-invalid @enderror"
                                                                    placeholder="Enter address"
                                                                    value="{{ $data->address ?? old('address') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="phone_number" class="form-label">Phone
                                                                    Number</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="phone_number"
                                                                    id="phone_number"
                                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                                    placeholder="Enter phone number"
                                                                    value="{{ $data->phone_number ?? old('phone_number') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="place_of_birth" class="form-label">Place Of
                                                                    Birth</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="place_of_birth"
                                                                    id="place_of_birth"
                                                                    class="form-control @error('place_of_birth') is-invalid @enderror"
                                                                    placeholder="Enter place of birth"
                                                                    value="{{ $data->place_of_birth ?? old('place_of_birth') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="date_of_birth" class="form-label">Date Of
                                                                    Birth</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="date" name="date_of_birth"
                                                                    id="date_of_birth"
                                                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                                                    placeholder="Enter phone number"
                                                                    value="{{ $data->date_of_birth ?? old('date_of_birth') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="role" class="form-label">Role</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="role" id="role"
                                                                    class="form-control @error('role') is-invalid @enderror"
                                                                    required>
                                                                    <option value="">Pilih</option>
                                                                    <option value="admin" @selected($data->role == 'admin')>
                                                                        Admin
                                                                    </option>
                                                                    <option value="pegawai" @selected($data->role == 'pegawai')>
                                                                        Pegawai
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable();

        });
    </script>
@endpush
