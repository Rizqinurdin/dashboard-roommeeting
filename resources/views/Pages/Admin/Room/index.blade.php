@extends('Layouts.Admin.main')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end p-4 mt-4">
            <a href="{{ route('rooms.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="card p-4 mt-1 bg-secondary">
            <h3 class="card-title" style="">List Rooms</h3>
            <div class="card-body table-responsive">
                <table id="table-room" class="table table-hover table-bordered" style="width: 100%;  ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Room Name</th>
                            <th class="text-center">Location Room</th>
                            <th class="text-center">Room Capacity</th>
                            <th class="text-center">Image Room</th>
                            <th class="text-center">__Options__</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->room_name }}</td>
                                <td>{{ $data->location_room }}</td>
                                <td class="text-center">{{ $data->room_capacity }}</td>
                                <td class="text-center">
                                    <a href="{{ asset($data->image_room) }}" target="_blank">
                                        <img src="{{ asset($data->image_room) }}" alt="image room" width="70">
                                    </a>
                                </td>
                                <td class=" d-flex justify-content-center gap-3">
                                    <form action="{{ route('rooms.destroy', $data->id_room) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?') "><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $data->id_room }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $data->id_room }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Department
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('rooms.update', $data->id_room) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="room_name" class="form-label">Room Name</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" name="room_name" id="room_name"
                                                                    class="form-control @error('room_name') is-invalid @enderror"
                                                                    placeholder="Enter room name"
                                                                    value="{{ $data->room_name ?? old('room_name') }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="location_room" class="form-label">Location
                                                                    Room</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" name="location_room"
                                                                    id="location_room"
                                                                    class="form-control @error('location_room') is-invalid @enderror"
                                                                    placeholder="Enter location room"
                                                                    value="{{ $data->location_room ?? old('location_room') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="room_capacity" class="form-label">
                                                                    Room Capacity</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="number" name="room_capacity"
                                                                    id="room_capacity"
                                                                    class="form-control @error('room_capacity') is-invalid @enderror"
                                                                    placeholder="Enter room capacity"
                                                                    value="{{ $data->room_capacity ?? old('room_capacity') }}"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="image_room" class="form-label">
                                                                    Image Room</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="hidden" name="image_room_old"
                                                                    value="{{ $data->image_room }}">
                                                                <input type="file" name="image_room" id="image_room"
                                                                    class="form-control @error('image_room') is-invalid @enderror"
                                                                    value="{{ old('image_room') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-2">
                                                                <label for="image_room" class="form-label">
                                                                    Image Room Old</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <img src="{{ asset($data->image_room) }}"
                                                                    alt="image room" width="70">
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
            $('#table-room').DataTable();
        });
    </script>
@endpush
