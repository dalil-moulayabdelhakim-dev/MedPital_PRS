<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
@include('labo.inc.header')

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs"
    data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
        @include('labo.inc.topBarNav')
        @include('labo.inc.navigation')

        @include('popup')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-3" style="min-height: 567.854px;">

            <!-- Main content -->
            <section class="content ">
                <div class="container-fluid">
                    @include('labo.inc.home')
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
