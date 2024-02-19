@extends('Layouts.Admin.main')

@section('content')
    <div class=" container-fluid mt-3">
        <div class="card bg-secondary p-4" style="color: white;">
            <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="room_name" class="form-label">Room Name</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="room_name" id="room_name"
                            class="form-control @error('room_name') is-invalid @enderror" placeholder="Enter room name"
                            value="{{ old('room_name') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="location_room" class="form-label">Location
                            Room</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="location_room" id="location_room"
                            class="form-control @error('location_room') is-invalid @enderror"
                            placeholder="Enter location room" value="{{ old('location_room') }}" required>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="room_capacity" class="form-label">
                            Room Capacity</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="number" name="room_capacity" id="room_capacity"
                            class="form-control @error('room_capacity') is-invalid @enderror"
                            placeholder="Enter room capacity" value="{{ old('room_capacity') }}" required>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="image_room" class="form-label">
                            Image Room</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="file" name="image_room" id="image_room"
                            class="form-control @error('image_room') is-invalid @enderror" value="{{ old('image_room') }}"
                            required>
                    </div>

                </div>
                <div class="col-lg-10 mt-4">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('rooms.index') }}" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-success" id="create">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).ready(function() {

        $("#create").on('click', function(e) {

                $("#create").html('<i class="fa fa-spinner fa-spin"></i>');
            }
        });
    });
</script>
