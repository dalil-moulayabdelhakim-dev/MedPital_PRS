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
                                            <span style="background-color: red" class="badge ">{{$settings['requests_count']}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('labo.view.appointment') }}"
                                            class="nav-link nav-appointments">
                                            <i class="nav-icon fas fa-calendar"></i>
                                            <p>
                                                Appointment List
                                            </p>&nbsp;
                                            <span style="background-color: red" class="badge ">{{$settings['app_count']}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-header">Maintenance</li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-tests active">
                                            <i class="nav-icon fas fa-th-list"></i>
                                            <p>
                                                Test List
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a  class="nav-link nav-tests">
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
                            <h3 class="card-title">List of Tests</h3>
                            <div class="card-tools">
                                <a href="javascript:void(0)" id="create_new"
                                    class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span> Add New
                                    Test</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover table-striped">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="20%">
                                        <col width="40%">
                                        <col width="10%">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gradient-primary text-light">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach ($settings['tests'] as $test)
                                        <tr>
                                            <td class="text-center">{{++$i}}</td>
                                            <td class="">
                                                <p class="m-0 truncate-1">{{$test->name}}</p>
                                            </td>
                                            <td class="">
                                                <p class="m-0 truncate-1">{{$test->description}}</p>
                                            </td>
                                            <td class="">
                                                <p class="m-0 truncate-1">{{$test->pivot->cost}}&nbsp;DA</p>
                                            </td>
                                            <td align="center">
                                                <button type="button"
                                                    class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item view_data" href=""><span
                                                            class="fa fa-eye text-dark"></span> View</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item edit_data" href=""><span
                                                            class="fa fa-edit text-primary"></span> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item delete_data" href=""><span
                                                            class="fa fa-trash text-danger"></span> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- /.content -->
            <div class="modal fade" id="confirm_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            <div id="delete_content"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-flat" id='confirm'
                                onclick="">Continue</button>
                            <button type="button" class="btn btn-secondary btn-flat"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title"></h5>
                        </div>
                        <div class="modal-body rounded-0">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-flat" id='submit'
                                onclick="$('#uni_modal form').submit()">Save</button>
                            <button type="button" class="btn btn-secondary btn-flat"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
                <div class="modal-dialog modal-full-height  modal-md rounded-0" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade rounded-0" id="viewer_modal" role='dialog'>
                <div class="modal-dialog modal-md rounded-0" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-dismiss="modal"><span
                                class="fa fa-times"></span></button>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        @include('labo.inc.footer')
</body>

</html>
