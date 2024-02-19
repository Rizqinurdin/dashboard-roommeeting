@extends('Layouts.Admin.main')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end p-4 mt-4">
            <a href="{{ route('departments.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="card p-4 mt-1 bg-secondary">
            <h3 class="card-title" style="">Departments</h3>
            <div class="card-body table-responsive">
                <table id="table-department" class="table table-hover table-bordered" style="width: 100%;  ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Department Name</th>
                            <th class="text-center">Department Description</th>
                            <th class="text-center">__Options__</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->department_name }}</td>
                                <td>{{ $data->department_description }}</td>
                                <td class=" d-flex justify-content-center gap-3">
                                    <form action="{{ route('departments.destroy', $data->id_department) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?') "><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $data->id_department }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $data->id_department }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Department
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('departments.update', $data->id_department) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="department_name" class="form-label">Department
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" name="department_name"
                                                                    id="department_name"
                                                                    class="form-control @error('department_name') is-invalid @enderror"
                                                                    placeholder="Enter department name"
                                                                    value="{{ $data->department_name ?? old('department_name') }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="department_description"
                                                                    class="form-label">Department Description</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" name="department_description"
                                                                    id="department_description"
                                                                    class="form-control @error('department_description') is-invalid @enderror"
                                                                    placeholder="Enter department description"
                                                                    value="{{ $data->department_description ?? old('department_description') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
            $('#table-department').DataTable();
        });
    </script>
@endpush
