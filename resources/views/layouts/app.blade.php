<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(!empty(auth()->user()->is_admin)){{"Admin"}}@else{{"Teacher"}}@endif Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('teachers.index') }}">School Management Application</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="#">{{ auth()->user()->name }}</a>
                    </li>

                    <!-- Show different menu based on user role -->
                    @if(auth()->user()->is_admin)
                        <!-- Admin Menu -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'teachers' ? 'active' : '' }}"
                                href="{{ route('teachers.index') }}">Manage Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'show_student' ? 'active' : '' }}"
                                href="{{ route('show_student') }}">View Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'show_parents' ? 'active' : '' }}"
                                href="{{ route('show_parents') }}">View Parents</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'show_announcements' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('show_announcements') }}">View Announcements</a>
                        </li>
                    @else
                        <!-- Teacher Menu -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'students' ? 'active' : '' }}"
                                href="{{ route(name: 'students.index') }}">Manage Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'parents' ? 'active' : '' }}"
                                href="{{ route('parents.index') }}">Manage Parents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'announcements' ? 'active' : '' }}"" href=" {{ route('announcements.index') }}">Manage Announcements</a>
                        </li>
                    @endif

                    <!-- Logout Option -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>