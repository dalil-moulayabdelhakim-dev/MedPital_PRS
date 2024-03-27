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
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i>Users profiles
                    </a>
                    <ul class="collapse list-unstyled menu show" id="homeSubmenu1">
                        <li><a href="{{ route('admin.profiles.page') }}">Admins</a></li>
                        <li><a href="{{ route('patient.profiles.page') }}">Patients </a></li>
                        <li class="active"><a href="{{ route('laboratorian.profiles.page') }}">Laboratorians</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">assignment_turned_in</i>Join Requests
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">

                        <li><a class="list-item" href="{{ route('patient.requests.page') }}">
                                <p>Patients</p> <span class="badge">{{ $settings['pat_req'] }}</span>
                            </a></li>
                        <li><a class="list-item" href="{{ route('laboratorian.requests.page') }}">
                                <p>Laboratorians</p> <span class="badge">{{ $settings['lab_req'] }}</span>
                            </a></li>
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
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

                                        @if (Auth::user()->user_type_id == 4)
                                            <a href="#multiDeleteEmployeeModal" class="btn btn-danger"
                                                data-toggle="modal" onclick="fetchMultiDelete()">
                                                <i class="material-icons">&#xE15C;</i>
                                                <span>Delete</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                            @if (Auth::user()->user_type_id == 4)
                                            <th style="max-width: 30px;">#</th>
                                            @endif
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
                                                @if (Auth::user()->user_type_id == 4)
                                                    <td>
                                                        <input type="checkbox" class="admin-checkbox" name="adminIds[]"
                                                            value="{{ $laboratorian->id }}">
                                                    </td>
                                                @endif
                                                <td>{{ $laboratorian->name }}</td>
                                                <td>{{ $laboratorian->id_card_number }}</td>
                                                <td>{{ $laboratorian->email }}</td>
                                                <td>{{ $laboratorian->phone }}</td>
                                                <td style="display: flex; gap: 10px;">
                                                    <button id="view-btn" href="#addEmployeeModal" data-toggle="modal"
                                                        type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        title="view all informations"
                                                        data-url="{{ config('app.url') }}"
                                                        onclick="fetchUserData({{ $laboratorian->id }})">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                    @if (Auth::user()->user_type_id == 4)
                                                        <button href="#deleteEmployeeModal" data-toggle="modal"
                                                            type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            onclick="fetchDelete({{ $laboratorian }})">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                                <td></td>
                                            <td></td>
                                            <td><strong>No User</strong></td>
                                            <td></td>
                                            @if (Auth::user()->user_type_id == 4)
                                            <td></td>
                                            @endif
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
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----show-modal end--------->

                    <!----delete-modal start--------->
                    <form action="{{ route('user.delete') }}" method="POST">
                        @csrf
                        <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
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
                                        <p>Are you sure you want to delete this User
                                        </p>
                                        <p class="text-warning2"><small>this action Cannot be Undone,</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <input type="hidden" name="id" id="id">
                                        <input type="submit" class="btn btn-danger" name="delete" value="Delete">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!----delete-modal end--------->

                    @if (Auth::user()->user_type_id == 4)
                        <!----multi-delete-modal start--------->
                        <form action="{{ route('user.multiDelete') }}" method="POST" id="multiDeleteForm">
                            @csrf

                            <div class="modal fade" tabindex="-1" id="multiDeleteEmployeeModal" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Laboratorians </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Users
                                            </p>
                                            <p class="text-warning2"><small>this action Cannot be Undone,</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <input type="hidden" name="adminIds" id="multiDeleteAdminIds"
                                                value="">
                                            <input type="submit" class="btn btn-danger" name="delete"
                                                value="Delete">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!----multi-delete-modal end--------->
                    @endif


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
