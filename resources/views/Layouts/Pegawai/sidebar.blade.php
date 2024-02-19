<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <i class="fa fa-user-edit me-2"></i>{{ env('APP_NAME') }}
            </h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/user.png') }}" alt=""
                    style="width: 40px; height: 40px" />
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ $user->name }}</h6>
                <span class=" text-capitalize">{{ $user->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard.pegawai') }}"
                class="nav-item nav-link @if ($active == 'dashboard') active @endif">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('pegawai.roommetting') }}"
                class="nav-item nav-link @if ($active == 'rooms') active @endif">
                <i class="fa-solid fa-table-cells-large me-2"></i>
                Rooms Metting</a>
            <a href="{{ route('pegawai.bookinglist') }}"
                class="nav-item nav-link @if ($active == 'bookinglist') active @endif">
                <i class="fa-solid fa-handshake me-2"></i>
                Booking List</a>
        </div>
    </nav>
</div>
