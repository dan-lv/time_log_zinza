<header>
    <div class="container">
        <div class="row">
            <a href="#" class="logo">
                <img src="images/logo3.png">
            </a>
            <nav id="home-nav">
                <ul class="main-menu">
                    @if (Auth::check())
                    <li><a href="#">List Absent</a></li>
                    <li><a href="#">Time-log</a></li>
                    <li><a href="#">Profile</a></li>
                    <li>
                        <a id="notification" href="#">Notification</a>
                        <div class="menu-container">
                            <div class="container">
                                <ul id="menu" class="clearfix">
                                    <li>
                                        <a href="#">category 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">category 2</a></li>
                                            <li><a href="#">category 2</a></li>
                                            <li><a href="#">category 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Chao [ {{ Auth::user()->name }} ]</a></li>
                    <li><a href="{{ route('login') }}">Logout</a></li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </nav>  
        </div>
    </div>
</header>
