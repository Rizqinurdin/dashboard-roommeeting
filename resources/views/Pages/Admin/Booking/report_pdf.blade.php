<style>
    table {
        font-size: 10px;
        width: 100%;


    }

    table,
    tr,
    th,
    td {
        border: 1px solid rgb(12, 144, 14);
        padding: 12px;
        border-collapse: collapse;

    }


    thead {
        background-color: rgb(139, 253, 139);
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }

    .no {
        text-align: center;
    }

    .title {
        text-align: center;
    }

    p {
        font-size: 12px;
        padding-left: 10px;
    }
</style>
<div class="card-body table-responsive">
    <h4 class="title">Report Booking </h4>
    <p>
        Start Date: {{ $start_date_time }} s/d End Date: {{ $end_date_time }}
    </p>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($bookinglist as $data)
                <tr>
                    <td class="no">{{ $loop->iteration }}</td>
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
