<div class="top-navbar">
    <div class="xd-topbar">
        <div class="row">
            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                <div class="xp-menubar">
                    <span class="material-icons text-white">signal_cellular_alt</span>
                </div>
            </div>

            <div class="col-md-5 col-lg-3 order-3 order-md-2">
                <div class="xp-searchbar">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon2">Go
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                <div class="xp-profilebar text-right">
                    <nav class="navbar p-0">
                        <ul class="nav navbar-nav flex-row ml-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="material-icons">question_answer</span>
                                </a>
                            </li>

                            <li class="dropdown nav-item">
                                <a class="nav-link" href="#" data-toggle="dropdown">
                                    <i class="material-icons" >person_outline</i>
                                    <span class="xp-user-live"></span>
                                </a>
                                <ul class="dropdown-menu small-menu">
                                    <li><a href="{{route('profile')}}">
                                            <span class="material-icons">person_outline</span>
                                            Profile
                                        </a></li>
                                    <li><a href="{{route('settings')}}">
                                            <span class="material-icons">settings</span>
                                            Settings
                                        </a></li>
                                    <li><a id="submit" style="cursor: pointer" data-csrf="{{ csrf_token() }}" onclick="mLogout()">
                                            <span class="material-icons">logout</span>
                                            Logout
                                        </a></li>

                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>

        </div>

        <div class="xp-breadcrumbbar text-center">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
            </ol>
        </div>


    </div>
</div>
