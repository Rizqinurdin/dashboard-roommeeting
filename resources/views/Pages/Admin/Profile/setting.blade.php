@extends('Layouts.Admin.main')

@section('content')
    <div class="mt-3 d-flex justify-content-center align-items-center">
        <div class="col-sm-12 col-xl-10">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Setting</h6>
                <form action="{{ route('profile.admin.update', $user->id_user) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="id_department" class="form-label">Department</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="id_department" id="id_department"
                                class="form-control bg-dark @error('id_department') is-invalid @enderror" required>
                                <option value="">Pilih</option>
                                @foreach ($departments as $dataD)
                                    <option value="{{ $dataD->id_department }}" @selected($dataD->id_department == $user->id_department)>
                                        {{ $dataD->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"
                                value="{{ $user->email ?? old('email') }}" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="password" class="form-label">New Password</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="hidden" name="old_password" value="{{ $user->password }}">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"
                                value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="name" class="form-label">Name</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter name"
                                value="{{ $user->name ?? old('name') }}" required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="gender" class="form-label">Gender</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="gender" id="gender"
                                class="form-control bg-dark @error('gender') is-invalid @enderror" required>
                                <option value="">Pilih</option>
                                <option value="L" @selected($user->gender == 'L')>L
                                </option>
                                <option value="P" @selected($user->gender == 'P')>P
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="address" class="form-label">Address</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Enter address"
                                value="{{ $user->address ?? old('address') }}" required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="phone_number" class="form-label">Phone
                                Number</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="phone_number" id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="Enter phone number" value="{{ $user->phone_number ?? old('phone_number') }}"
                                required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="place_of_birth" class="form-label">Place Of
                                Birth</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="place_of_birth" id="place_of_birth"
                                class="form-control @error('place_of_birth') is-invalid @enderror"
                                placeholder="Enter place of birth"
                                value="{{ $user->place_of_birth ?? old('place_of_birth') }}" required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="date_of_birth" class="form-label">Date Of
                                Birth</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                placeholder="Enter phone number"
                                value="{{ $user->date_of_birth ?? old('date_of_birth') }}" required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label for="role" class="form-label">Role</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="role" id="role"
                                class="form-control bg-dark @error('role') is-invalid @enderror" required>
                                <option value="">Pilih</option>
                                <option value="admin" @selected($user->role == 'admin')>
                                    Admin
                                </option>
                                <option value="pegawai" @selected($user->role == 'pegawai')>
                                    Pegawai
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10 mt-4">
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('profile.admin') }}" class="btn btn-light">Back</a>
                            <button type="submit" class="btn btn-success" id="create">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('datatable/jquery.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {

            $('#id_department').select2();
            $('#gender').select2();
            $('#role').select2();
        });
    </script>
@endpush
