<div class="modal fade" id="customAlertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="alert-message" style="color:black"
                     {{--data-user="{{ $user->email_verified_at }}"--}}>
                </p>
                <div class="alert alert-warning"><small>Your account will be automatically deleted after three days
                        unless you verify your email</small></div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" id="redirectBtn">Go to Inbox</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="redirectBtn">Later</button>
            </div>
        </div>
    </div>
</div>
