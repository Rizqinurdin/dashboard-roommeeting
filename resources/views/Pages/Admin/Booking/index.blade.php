@extends('Layouts.Admin.main')

@section('content')
    <div class="container-fluid">
        <div class="card bg-secondary p-4 mt-4">
            <h4>Reports</h4>
            <form action="{{ route('admin.searchDate') }}" method="post" class="mt-3">
                <div class="row d-flex justify-content-start align-items-center">
                    @csrf
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="start_date_time">Start Date</label>
                        <input type="date" name="start_date_time" id="start_date_time" value="{{ old('start_date_time') }}"
                            class="form-control" required>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="end_date_time">End Date</label>
                        <input type="date" name="end_date_time" id="end_date_time" value="{{ old('end_date_time') }}"
                            class="form-control" required>
                    </div>
                    <div class="col-lg-1 col-3">
                        <button type="submit" class="btn btn-sm btn-primary mt-4">Search</button>
                    </div>
                    <div class="col-lg-1 col-3">
                        <a href="{{ route('admin.bookinglist') }}" class="btn btn-sm btn-success mt-4">Refresh</a>
                    </div>
                    @empty($print)
                    @else
                        <div class="col-1">
                            <a href="{{ route('admin.report_pdf', [$start_date_time, $end_date_time]) }}"
                                class="btn btn-sm btn-warning mt-4" target="_blank">Print</a>
                        </div>
                    @endempty
                </div>
            </form>
        </div>
        <div class="mt-5 bg-secondary card p-3">
            <h3 class=" card-title">BOOKING LIST</h3>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="table-list-booking">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Name</td>
                            <td class="text-center">Department</td>
                            <td class="text-center">Room</td>
                            <td class="text-center">Start Date Time</td>
                            <td class="text-center">End Date Time</td>
                            <td class="text-center">Purpose</td>
                            <td class="text-center">Status</td>
                            <td class="text-center">__Options__</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookinglist as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
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
                                <td class="text-center d-flex justify-content-center gap-3">
                                    @if ($data->status == 'Pending')
                                        <a href="{{ route('admin.approved', $data->id_booking) }}"
                                            class="btn btn-sm btn-primary"
                                            onclick="return confirm('Do you want to agree to this ?')">Approved</a>
                                        <a href="{{ route('admin.rejected', $data->id_booking) }}"
                                            class="btn btn-sm btn-warning text-white"
                                            onclick="return confirm('Do you want to reject this ?')">Rejected</a>
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
