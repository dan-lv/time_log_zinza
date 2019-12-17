<header>
    <div class="container">
        <div class="row">
            <a href="/" class="col-3 logo">
                <img src="images/logo3.png">
            </a>
            <ul class="nav col-9 justify-content-end">
                @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('absents.index') }}">List Absent</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('timelogs.index') }}">Time-log</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profiles.show', Auth::user()->id) }}">Profile</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Notification</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">category 2</a>
                        <a class="dropdown-item" href="#">category 2</a>
                        <a class="dropdown-item" href="#">category 2</a>
                    </div>
                </li>
                    @if ((Auth::user()->role) == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Admin</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('manage.absents.index') }}">Manage Absent</a>
                                <a class="dropdown-item" href="{{ route('manage.timelogs.index') }}">Manage Time Logs</a>
                                <a class="dropdown-item" href="{{ route('manage.users.index') }}">Manage User</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="#">Welcome [ {{ Auth::user()->name }} ]</a></li>
                    @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>
