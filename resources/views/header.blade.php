<header>
    <div class="container">
        <div class="row">
            <a href="#" class="col-4 logo">
                <img src="images/logo3.png">
            </a>
            <ul class="nav col-8 justify-content-end">
                @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="#">List Absent</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Time-log</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Notification</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">category 2</a>
                        <a class="dropdown-item" href="#">category 2</a>
                        <a class="dropdown-item" href="#">category 2</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Chao [ {{ Auth::user()->name }} ]</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Logout</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>
