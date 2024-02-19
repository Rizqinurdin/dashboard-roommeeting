@extends('Layouts.Pegawai.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 ">
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
@endsection
