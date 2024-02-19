@extends('Layouts.Admin.main')

@section('content')
    <div class=" container-fluid mt-3">
        <div class="card bg-secondary p-4" style="color: white;">
            <form action="{{ route('departments.store') }}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="department_name" class="form-label">Department Name</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="department_name" id="department_name"
                            class="form-control @error('department_name') is-invalid @enderror"
                            placeholder="Enter department name" value="{{ old('department_name') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <label for="department_description" class="form-label">Department Description</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="department_description" id="department_description"
                            class="form-control @error('department_description') is-invalid @enderror"
                            placeholder="Enter department description" value="{{ old('department_description') }}" required>
                    </div>

                </div>
                <div class="col-lg-10 mt-4">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('departments.index') }}" class="btn btn-light">Back</a>
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



{{-- <script>
    $(document).ready(function() {
        $("#create").on('click', function(e) {
            e.preventDefault();
            $("#create").html('<i class="fa fa-spinner fa-spin"></i>');

            let formData = {
                _token: $('input[name="_token"]').val(),
                department_name: $("#department_name").val(),
                department_description: $("#department_description").val()

            };

            $.ajax({
                type: 'POST',
                url: "{{ route('departments.store') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Tangani keberhasilan, contoh:
                    console.log('department created successfully', response);
                },
                error: function(error) {
                    // Tangani kesalahan, misalnya, tampilkan pesan kesalahan validasi kepada pengguna
                    console.log('Error creating department', error.responseJSON.errors);
                },

                complete: function() {
                    $("#create").html('Create');
                }

            });


        });
    });
</script> --}}
