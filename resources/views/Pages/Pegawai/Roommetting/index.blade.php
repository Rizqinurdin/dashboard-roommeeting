@extends('Layouts.Pegawai.main')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start gap-3 mt-3">
            <h3>LIST ROOM</h3>
        </div>
        <div class="row d-flex justify-content-center gap-2 mt-3">
            @foreach ($rooms as $data)
                <div class="col-lg-3  col-md-4 p-3 card bg-secondary">
                    <h5 class="card-title ">{{ $data->room_name }}</h5>
                    <p>Location : {{ $data->location_room }}</p>
                    <p>capacity : {{ $data->room_capacity }}</p>
                    <img src="{{ asset($data->image_room) }}" alt="" class="card-top">
                    <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#{{ $data->id_room }}">
                            Booking Now
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ $data->id_room }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <form action="{{ route('pegawai.booking') }}" method="post">
                                    @csrf
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Booking
                                                ({{ $data->room_name }})
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-3">
                                            {{-- data tambahan --}}
                                            <input type="hidden" name="id_user" id=""
                                                value="{{ $user->id_user }}">
                                            <input type="hidden" name="id_department" id=""
                                                value="{{ $user->id_department }}">
                                            <input type="hidden" name="id_room" id=""
                                                value="{{ $data->id_room }}">
                                            <div class="row mt-3">
                                                <div class="col-lg-3">
                                                    Location
                                                </div>
                                                <div class="col-lg-9">
                                                    {{ $data->location_room }}
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3">
                                                    Capacity
                                                </div>
                                                <div class="col-lg-9">
                                                    {{ $data->room_capacity }} People
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3">
                                                    <label for="start_date_time">Start Date Time</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="datetime-local" name="start_date_time" id="start_date_time"
                                                        class="form-control @error('start_date_time') is-invalid @enderror"
                                                        value="{{ old('start_date_time') }}">
                                                    @error('start_date_time')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3">
                                                    <label for="end_date_time">End Date Time</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="datetime-local" name="end_date_time" id="end_date_time"
                                                        class="form-control @error('end_date_time') is-invalid @enderror"
                                                        value="{{ old('end_date_time') }}">
                                                    @error('end_date_time')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3">
                                                    <label for="purpose">Purpose</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <textarea name="purpose" id="purpose" cols="30" rows="5"
                                                        class="form-control @error('purpose') is-invalid @enderror">{{ old('purpose') }}</textarea>
                                                    @error('purpose')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
