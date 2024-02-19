@extends('Layouts.Admin.main')

@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 ">
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Users</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countUsers) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-3x fa-shop text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Meeting Room</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countRoom) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-building fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Department</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countDepartment) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-hourglass-half fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Pending</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countPending) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-handshake fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Approved</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countApproved) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-circle-xmark fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h5 class="mb-2 text-primary">Total Rejected</h5>
                        <h2 class="mb-0 text-end">{{ number_format($countRejected) }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="mt-5 bg-secondary card p-3">
            <h3 class=" card-title">BOOKING LIST</h3>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="table-list-booking">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Kode</td>
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
                                <td>
                                    <a href="{{ route('admin.bookinglist') }}"
                                        class=" text-white">{{ substr(Hash::make($data->id_booking), 0, 8) }}</a>
                                </td>
                                <td>
                                    {{ $data->department_name }}
                                </td>
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

    <!-- Sale & Revenue End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-list-booking').DataTable();
        });
    </script>
@endpush
