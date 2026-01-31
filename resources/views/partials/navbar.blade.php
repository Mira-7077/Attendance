<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fa-solid fa-calendar-check"></i> Attendance System
        </a>

        <div class="ms-auto d-flex align-items-center">
            @auth
                {{-- Dashboard link --}}
                @if(auth()->user()->is_admin)
                    <a href="/admin/dashboard" class="btn btn-sm btn-outline-light me-3">
                        Dashboard
                    </a>
                @elseif(auth()->user()->role->name === 'teacher')
                    <a href="/teacher/dashboard" class="btn btn-sm btn-outline-light me-3">
                        Dashboard
                    </a>
                @else
                    <a href="/student/dashboard" class="btn btn-sm btn-outline-light me-3">
                        Dashboard
                    </a>
                @endif

                <span class="text-white me-3">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-light">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
