<div class="popup-container">
    <ul class="popup-menu">
        @if ($error = Session::get('error'))
            @foreach ($error as $message)
                <li>
                    <div class="alert alert-danger" role="alert">
                        {{ $message }} &nbsp;
                        <span aria-hidden="true">&times;</span>
                    </div>
                </li>
            @endforeach
        @endif
        @if ($success = Session::get('success'))
            @foreach ($success as $message)
                <li>
                    <div class="alert alert-success" role="alert">
                        {{ $message }} &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            @endforeach
        @endif
        @if ($info = Session::get('info'))
            @foreach ($info as $message)
                <li>
                    <div class="alert alert-info" role="alert">
                        {{ $message }} &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            @endforeach
        @endif
        @if ($warning = Session::get('warning'))
            @foreach ($warning as $message)
                <li>
                    <div class="alert alert-warning" role="alert">
                        {{ $message }} &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            @endforeach
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $message)
                <li>
                    <div class="alert alert-danger">
                        {{ $message }} &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>
