<!doctype html>
<html lang="en">
<base href="/public">
@include('admin.layouts.head')

<body>

    @include('popup')


    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>
        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/favicon.webp" class="img-fluid" /><span> Med Admin </span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li>
                    <a href="{{ route('/') }}" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i>Users profiles
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="{{ route('admin.profiles.page') }}">Admins</a></li>
                        <li><a href="{{ route('patient.profiles.page') }}">Patients </a></li>
                        <li><a href="{{ route('laboratorian.profiles.page') }}">Laboratorians</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <i class="material-icons">assignment_turned_in</i>Join Requests
                    </a>
                    <ul class="collapse list-unstyled menu show" id="homeSubmenu2">
                        <li ><a class="list-item" href="{{route('patient.requests.page')}}"><p>Patients</p> <span class="badge">{{$settings['pat_req']}}</span></a></li>
                        <li class="active"><a class="list-item" href="{{route('laboratorian.requests.page')}}"><p>Laboratorians</p> <span class="badge">{{$settings['lab_req']}}</span></a></li>
                    </ul>
                </li>



            </ul>
        </div>


        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->


            @include('admin.layouts.navbar')
            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage Laboratorians</h2>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px">Name</th>
                                        <th>Id card number</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if ($settings['users']->count() > 0)
                                        @foreach ($settings['users'] as $laboratorian)
                                            <tr>

                                                <td>{{ $laboratorian->name }}</td>
                                                <td>{{ $laboratorian->id_card_number }}</td>
                                                <td>{{ $laboratorian->email }}</td>
                                                <td>{{ $laboratorian->phone }}</td>
                                                <td>
                                                    <button id="view-btn" href="#addEmployeeModal" data-toggle="modal"
                                                        type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        title="view all informations"
                                                        data-url="{{ config('app.url') }}"
                                                        onclick="fetchUserData({{ $laboratorian->id }})">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>No User</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!----show-modal start--------->
                    <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <label id="name" class="form-control"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>ID card number</label>
                                        <label id="id_card_number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <label id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <label id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea id="address" class="form-control" disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>ID card file</label>
                                        <img id="file" class="form-control-img" alt="The file is missing"></img>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                        <a id="reject_btn" type="button" class="btn btn-danger">Reject</a>
                                        <a id="accept_btn" type="button" class="btn btn-success">Accept</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----show-modal end--------->





                    <!----edit-modal start--------->
                    <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emil" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->


                    <!----delete-modal start--------->
                    <form action="" method="POST">

                        <div class="modal fade" tabindex="-1" id="deleteEmployeeModal_<id></id>" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete admin </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Records
                                            (id here)
                                        </p>
                                        <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <input type="hidden" name="id" value="idhere">
                                        <input type="submit" class="btn btn-danger" name="delete" value="Delete">

                                    </div>
                                </div>
                            </div>
                        </div>
                        </from>
                        <!----edit-modal end--------->




                </div>
            </div>

            <!------main-content-end----------->








        </div>

    </div>



    <!-------complete html----------->


    @include('admin.layouts.footer')




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('admin.layouts.scripts')





</body>

</html>
