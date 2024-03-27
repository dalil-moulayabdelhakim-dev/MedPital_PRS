<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.webp') }}" type="image/webp" />
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="homed">
        <a href="{{ route('/') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Home</a>
    </div>
    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden mt-5 mb-5">
            <div class="row no-gutters row-bordered row-border-light">

                <div style="width: 100%">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="img/settings/user-pic.png" class=" ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <p class="form-control mb-1">{{ $user->name }}</p>
                                </div>
                                @if ($user->institution != null)
                                    <div class="form-group">
                                        <label class="form-label">Institution </label>
                                        <p class="form-control">{{ $user->institution->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Localisation</label>
                                        <p class="form-control">{{ $user->institution->location }}</p>
                                    </div>
                                @endif

                                @if ($user->gender != 0)
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <p class="form-control">
                                            {{ $user->gender == 1 ? 'Male' : 'Female' }}
                                        </p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="form-label">Identity card number</label>
                                    <p class="form-control">{{ $user->id_card_number }}</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <p class="form-control">{{ $user->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <p class="form-control">{{ $user->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="{{ $user->email }}">
                                    @if ($user->email_verified_at == null)
                                         <form action="{{--{{ route('verification.send') }}--}}" id="verifyEmailForm"
                                            method="POST">
                                            @csrf
                                            <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                    <button type="submit" class="link">Resend confirmation</button>
                                            </div>
                                        </form>
                                    </div>
                                        @else
                                        <div class="form-group">
                                                <div class="alert alert-success mt-3">
                                                    Your email is confirmed.<br>
                                                </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/auth/manager.js') }}"></script>
    </script>
</body>

</html>



{{--
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    <div class="up-cont">
        <!--================Header Menu Area =================-->
        @include('layout.header')
        <!--================Header Menu Area =================-->

        <section class="home_banner_area ">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content row">
                        <div class="col-lg-12 center">
                            @if ($user != null)
                                <p class="sub text-uppercase">name: {{ $user->name }}</p>
                                <p class="sub text-uppercase">id card number: {{ $user->id_card_number }}</p>
                                <p class="sub text-uppercase">gender:
                                    @if ($user->gender == 2)
                                        Female
                                    @else
                                        Male
                                    @endif
                                </p>
                                @if ($user->specialty != null)
                                    <p class="sub text-uppercase">specialty: {{ $user->specialty->name }}</p>
                                @endif
                                <p class="sub text-uppercase">email: {{ $user->email }}</p>
                                <p class="sub text-uppercase">phone: {{ $user->phone }}</p>
                                <p class="sub text-uppercase">user_type: {{ $user->user_type->name }}</p>
                                <p class="sub text-uppercase">id card file: <a href="{{ $user->id_card_file }}" target="blank"
                                        class="btn link ">GO</a></p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('layout.script')
</body>

</html> --}}
