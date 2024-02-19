@extends('Layouts.Pegawai.main')

@section('content')
    <div class="container-fluid">
        <div class="mt-5 bg-secondary card p-3">
            <h3 class=" card-title">BOOKING LIST</h3>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="table-list-booking">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Department</td>
                            <td class="text-center">Room</td>
                            <td class="text-center">Start Date Time</td>
                            <td class="text-center">End Date Time</td>
                            <td class="text-center">Purpose</td>
                            <td class="text-center">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookinglist as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->department_name }}</td>
                                <td>{{ $data->room_name }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime($data->start_date_time)) }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime($data->end_date_time)) }}</td>
                                <td>{{ $data->purpose }}</td>
                                <td class="text-center">
                                    @if ($data->status == 'Approved')
                                        <span class="badge bg-primary">
                                            {{ $data->status }}
                                        </span>
                                    @elseif ($data->status == 'Rejected')
                                        <span class="badge bg-warning text-white">
                                            {{ $data->status }}
                                        </span>
                                    @else
                                        <span class="badge bg-info">
                                            {{ $data->status }}
                                        </span>
                                    @endif
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
            $('#table-list-booking').DataTable();
        });
    </script>
@endpush
