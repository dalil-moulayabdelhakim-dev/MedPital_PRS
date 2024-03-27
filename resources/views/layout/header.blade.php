<header class="header_area">

    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="logo" href="">
                    <img src="img/logo.webp" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 ">
                        <div class="col-lg-12 pr-0">
                            <ul class="nav navbar-nav pull-right">
                                <li class="nav-item menuItem active">
                                    <a class="nav-link" href="{{route('/')}}">Home</a>
                                </li>
                                <li class="nav-item menuItem submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">Doctors<i
                                            class="bi bi-caret-down"></i></a>

                                    <ul class="dropdown-menu">


                                        <li class="nav-item">
                                            <a class="nav-link" href="">No item</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item menuItem submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">Services<i
                                            class="bi bi-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">No item</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item menuItem submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">Departments<i
                                            class="bi bi-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">No item</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item menuItem">
                                    <a class="nav-link" href="">Contact</a>
                                </li>

                                @if (Route::has('login'))
                                    @auth
                                        <li class="nav-item menuItem submenu dropdown">

                                            <div>
                                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false"><i
                                                        class="bi bi-person"></i> <i class="bi bi-caret-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('profile')}}"><i class="bi bi-person cl-blue pr-15 fs-18"></i>
                                                            Profile</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('settings')}}"><i class="bi bi-gear cl-orng pr-15 fs-18"></i>
                                                            Setting</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a id="submit" class="nav-link" data-csrf="{{ csrf_token() }}" onclick="mLogout()"><i class="bi bi-box-arrow-left cl-red pr-15 fs-18"></i> Logout</a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </li>
                                    @else
                                        <div class="contaner my-contaner">
                                            <li class="nav-item menuItem">
                                                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                                                <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
                                            </li>
                                        </div>
                                    @endauth
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
