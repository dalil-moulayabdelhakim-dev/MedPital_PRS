<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
@include('labo.inc.header')


<style>
    .img-thumb-path {
        width: 100px;
        height: 80px;
        object-fit: scale-down;
        object-position: center center;
    }
</style>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs"
    data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
        @include('labo.inc.topBarNav')
        @include('popup')
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand bg-gradient-black">
            <!-- Brand Logo -->
            <a href="/" class="brand-link bg-transparent text-sm border-info shadow-sm bg-primary">
                <img src="img/favicon.webp" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black"
                    style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
                <span class="brand-text font-weight-light">MedLab</span>
            </a>
            <!-- Sidebar -->
            <div
                class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                            <!-- Sidebar user panel (optional) -->
                            <div class="clearfix"></div>
                            <!-- Sidebar Menu -->
                            <nav class="mt-4">
                                <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child"
                                    data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('/') }}" class="nav-link nav-home">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('labo.view.request') }}" class="nav-link nav-home">
                                            <i class="nav-icon fas fa-bell"></i>
                                            <p>
                                                Requests
                                            </p>&nbsp;
                                            <span style="background-color: red"
                                                class="badge ">{{ $settings['requests_count'] }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="justify-content: space-between"
                                            class="nav-link nav-appointments active">
                                            <i class="nav-icon fas fa-calendar"></i>
                                            <p>
                                                Appointment List &nbsp;
                                            </p>&nbsp;
                                            <span style="background-color: red"
                                                class="badge ">{{ $settings['app_count'] }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-header">Maintenance</li>
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('labo.view.testList') }}" class="nav-link nav-tests">
                                            <i class="nav-icon fas fa-th-list"></i>
                                            <p>
                                                Test List
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-tests">
                                            <i class="nav-icon fas fa-archive"></i>
                                            <p>
                                                Archives
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('labo.view.settings') }}" class="nav-link nav-system_info">
                                            <i class="nav-icon fas fa-cogs"></i>
                                            <p>
                                                Settings
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-3" style="min-height: 567.854px;">

            <!-- Main content -->
            <section class="content ">
                <div class="container-fluid">
                    <div class="card card-outline card-primary rounded-0 shadow">
                        <div class="card-header">
                            <h3 class="card-title">List of Booked Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="container-fluid">
                                    <table class="table table-bordered table-hover table-striped">
                                        <colgroup>
                                            <col width="5%">
                                            <col width="10%">
                                            <col width="15%">
                                            <col width="15%">
                                            <col width="30%">
                                            <col width="10%">
                                            <col width="10%">
                                        </colgroup>
                                        <thead>
                                            <tr class="bg-gradient-primary text-light">
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Schedule</th>
                                                <th>Patient</th>
                                                <th>Test</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($settings['app']->count() > 0)
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($settings['app'] as $appointment)
                                                    <tr>

                                                        <td class="">
                                                            <p class="m-0 truncate-1">
                                                                {{ $i++ }}
                                                            </p>
                                                        </td>
                                                        <td class="">
                                                            <p class="m-0 truncate-1">
                                                                {{ $appointment->code }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="m-0 truncate-1">
                                                                {{ $appointment->schedule }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="m-0 truncate-1">
                                                                {{ $appointment->patient->name }}
                                                            </p>
                                                        </td>
                                                        <td class="">
                                                            <p class="m-0 truncate-1">
                                                                @foreach ($appointment->prescription->analyses as $analyse)
                                                                    {{ $analyse->name }} |&nbsp;
                                                                @endforeach
                                                            </p>
                                                        </td>
                                                        <td class="">
                                                            @switch($appointment->status)
                                                                @case(0)
                                                                    <p class="m-0 truncate-1 badge badge-info">
                                                                        Pending
                                                                    </p>
                                                                @break

                                                                @case(1)
                                                                    <p class="m-0 truncate-1 badge badge-primary   ">
                                                                        Approved
                                                                    </p>
                                                                @break

                                                                @case(2)
                                                                    <p class="m-0 truncate-1 badge badge-warning  ">
                                                                        Sample Collected
                                                                    </p>
                                                                @break

                                                                @case(3)
                                                                    <p class="m-0 truncate-1 badge badge-secondary   ">
                                                                        Delivered to Lab
                                                                    </p>
                                                                @break

                                                                @case(4)
                                                                    <p class="m-0 truncate-1 badge badge-success   ">
                                                                        Done
                                                                    </p>
                                                                @break

                                                                @case(5)
                                                                    <p class="m-0 truncate-1 badge badge-danger   ">
                                                                        Cancelled
                                                                    </p>
                                                                @break

                                                                @case(6)
                                                                    <p class="m-0 truncate-1 badge badge-dark   ">
                                                                        Report Uploaded
                                                                    </p>
                                                                @break
                                                            @endswitch
                                                        </td>
                                                        <td align="center">
                                                            <button type="button"
                                                                class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown">
                                                                Action
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                                <button id="view-btn" href="#uni_modal"
                                                                    data-toggle="modal" type="button"
                                                                    class="dropdown-item view_data"
                                                                    data-bs-toggle="modal"
                                                                    title="view all informations"
                                                                    onclick="fetchAppointmentData({{ $appointment->id }})">
                                                                    <span class="fa fa-eye text-dark"></span> View
                                                                </button>

                                                                <div class="dropdown-divider"></div>
                                                                <button id="edt_btn" class="dropdown-item edit_data"
                                                                    href="#edit_modal" data-toggle="modal"
                                                                    onclick="editAppModal({{ $appointment->id }})"
                                                                    type="button" data-bs-toggle="modal">
                                                                    <span class="fa fa-edit text-primary"></span>
                                                                    Edite</button>

                                                                <div class="dropdown-divider"></div>

                                                                <button class="dropdown-item delete_data"
                                                                    id="delete-btn" href="#confirm_modal"
                                                                    data-toggle="modal"
                                                                    data-url="{{ config('app.url') }}"
                                                                    onclick="fetchDeleteAppointment({{ $appointment->id }})"
                                                                    type="button" data-bs-toggle="modal"><span
                                                                        class="fa fa-trash text-danger"></span>
                                                                    Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                <td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>No Item</td>
                                                    <td></td>
                                                    <td></td>
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!--view request modal-->
            <div class="modal fade " id="uni_modal" style="overflow: hidden; display: none;" aria-hidden="true">
                <div role="document" class="modal-dialog modal-md modal-dialog-centered">
                    <div style="max-height: 490px; min-width: 600px; border-radius: 8px" class="modal-content ">
                        <div class="modal-header ">
                            <h5 class="modal-title">Client Details</h5>
                        </div>
                        <div class="modal-body text-center" style="overflow: auto;">
                            <style>
                                hr {
                                    background-color: black;
                                }

                                h4 {
                                    text-align: center;
                                }

                                #client-img {
                                    height: 200px;
                                    width: 200px;
                                    object-fit: scale-down;
                                    object-position: center center;
                                }

                                .custom-modal-fluid {
                                    overflow: auto;
                                }
                            </style>
                            <div class="container-fluid custom-modal-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <img src="img/settings/user-pic.png" alt="Client Image"
                                            class="img-circle border bg-gradient-dark" id="client-img">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <dl>
                                            <h4>
                                                <hr>
                                                Appointment
                                                <hr>
                                            </h4>
                                            <h2 id="status" class="fs-4 fw-bold badge" style="width:fit-content">
                                            </h2>
                                            <dt class="text-muted">Code</dt>
                                            <dd id="code" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Schedule</dt>
                                            <dd id="schedule" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Status</dt>
                                            <h4>
                                                <hr>
                                                Patient
                                                <hr>
                                            </h4>
                                            <dt class="text-muted">Name</dt>
                                            <dd id="patientName" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Address</dt>
                                            <dd id="patientAddress" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Phone</dt>
                                            <dd id="patientPhone" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Email</dt>
                                            <dd id="patientEmail" class=" fs-4 fw-bold"></dd>
                                            <dt class="text-muted">Gender</dt>
                                            <dd id="patientGender" class=" fs-4 fw-bold"></dd>
                                            <h4>
                                                <hr>Prescription
                                                <hr>
                                            </h4>
                                            <dt class="text-muted">Status</dt>
                                            <h4 id="prescriptionStatus" class=" fs-4 fw-bold"></h4>
                                            <table class="table-bordered table-hover table-striped p-4">
                                                <colgroup>
                                                    <col width="30%">
                                                    <col width="70%">
                                                </colgroup>
                                                <thead class="bg-gradient-primary text-light">
                                                    <th>Name</th>
                                                    <th>Decription</th>
                                                </thead>
                                                <tbody id="prescriptionInfo">
                                                </tbody>
                                            </table>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--view appointment modal-->
            <div class="modal fade " id="edit_modal" style="overflow: hidden; display: none;" aria-hidden="true">
                <div role="document" class="modal-dialog modal-md modal-dialog-centered">
                    <div style="max-height: 490px; min-width: 600px; border-radius: 8px" class="modal-content ">
                        <form action="{{ route('labo.edit.appointment') }}" method="POST">
                            @csrf
                            <div class="modal-header ">
                                <h5 class="modal-title">Appointment</h5>
                            </div>
                            <div class="modal-body" style="overflow: auto;">
                                <style>
                                    hr {
                                        background-color: black;
                                    }

                                    h4 {
                                        text-align: center;
                                    }

                                    .custom-modal-fluid {
                                        overflow: auto;
                                    }
                                </style>
                                <div class="container-fluid custom-modal-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group col-12">
                                                <label for="name">Patient Name</label>
                                                <input type="text" id="p-name" class="form-control" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-12">
                                                <label for="name">Institution Name</label>
                                                <input type="text" id="i-name" class="form-control" readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group col-12">
                                                <label for="name">Schedule</label>
                                                <input type="datetime-local" name="schedule" id="Eschedule"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-12">
                                                <label for="name">Code</label>
                                                <input type="text" id="Ecode" name="code"
                                                    class="form-control" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="test_ids" class="control-label">Test</label>
                                            <select name="test_ids[]" id="test_ids"
                                                class="form-control form-control-border select2" required disabled
                                                multiple>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="name">Status</label>
                                            <select name="status" id="Estatus" class="form-control " required>
                                            </select>
                                        </div>
                                    </div>

                                    <input style="display: none" type="text" id="id" name="id">
                                </div>
                                <script></script>
                            </div>
                            <div class="modal-footer">
                                <div class="text-right">
                                    <button id="mk-app" type="submit" class="btn btn-primary"
                                        title="submit the informations">
                                        <span class="fa fa-calendar"></span> Submit
                                    </button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- /.content -->
            <div class="modal fade" id="confirm_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                    <div style="max-height: 490px; min-width: 600px; border-radius: 8px" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            <style>
                                .bd-warning {
                                    background-color: #ffbb0041;
                                    border-radius: 3px;
                                    padding: 10px
                                }
                            </style>
                            <div id="delete_content">
                                <p>Are u sure u want to delete it</p>
                            </div>
                            <div class="text-warning bd-warning">This action cannot be undone!</div>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" id='confirm' onclick="">Confirm</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- /.content-wrapper -->
        @include('labo.inc.footer')
        <script src="labo/dist/js/modal-manage/modal.js"></script>
</body>

</html>
