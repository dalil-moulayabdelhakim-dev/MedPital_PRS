<!doctype html>
<html lang="en">

@include('admin.layouts.head')

<body>


    @include('popup')

    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        @include('admin.layouts.side_bar')

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            @include('admin.layouts.navbar')
            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">
                @if ($errors->any())
                    <div class="alert alert-danger" style="width: 100%">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4 grid-margin pb-3">
                        <div class="card card-success" title="All users you approved his accounts">
                            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="card-body">
                                    <h5>Total Users</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0 font-size-large">{{ $settings['total_users'] }}</h2>
                                                <p class=" ml-2 mb-0 font-weight-medium">user</p>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg bi material-icons text-success ml-auto">person_outline</i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4 grid-margin">
                        <div class="card card-warning" title="All users whose awaiting action from you">
                            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="card-body">
                                    <h5>Total Requests</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0 font-size-large">{{ $settings['total_join_requests'] }}</h2>
                                                <p class=" ml-2 mb-0 font-weight-medium">user</p>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i
                                                class="icon-lg bi material-icons text-warning ml-auto">assignment_returned</i>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

                    @if ($user->user_type_id == 4)
                        <div class="col-sm-4 grid-margin">
                            <div class="card card-danger" title="All active admins">
                                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <div class="card-body">
                                        <h5>Total Admins</h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 class="mb-0 font-size-large">{{ $settings['total_admins'] }}</h2>
                                                    <p class=" ml-2 mb-0 font-weight-medium">admin</p>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="icon-lg bi material-icons text-danger ml-auto">shield</i>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <!------main-content-end----------->

        </div>

    </div>

    @include('admin.layouts.footer')
    <!-------complete html----------->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('admin.layouts.scripts')
</body>
</html>
