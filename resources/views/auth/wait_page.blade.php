<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

@include('auth.layouts.head')

<body>

@include('popup')
    <div class="homed">
        <a href="{{ route('/') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Home</a>
    </div>
    @include('modal.email_verifay_modal')
    </div>
    <div class="login-container">
        <div class="title">{{$settings['title']}}</div>
        <div class="content">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <div class="input-box pd-top-10">
                        <span class="details">{{$settings['message']}}

                        </span>

                    </div>

                <div class="button">
                    <input type="submit" value="Logout">
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('js/auth/manager.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
