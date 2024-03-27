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
    <div class="container light-style flex-grow-1 container-p-y ">
        <div class="card overflow-hidden mt-5 mb-5" style="min-height: 720px">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0" style="border-right: 1px solid rgb(197, 197, 197); min-height: 720px">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="img/settings/user-pic.png" class=" ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <a href="" class="btn btn-outline-secondary md-btn-flat">Reset</a>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-1" value="{{ $user->name }}">
                                </div>
                                @if ($user->institution != null)
                                    <div class="form-group">
                                        <label class="form-label">Specialization </label>
                                        <p class="form-control">{{ $user->specialty->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Institution </label>
                                        <p class="form-control">{{ $user->institution->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Localisation</label>
                                        <p class="form-control">{{ $user->institution->location }}</p>
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
                                    @else
                                        <div class="form-group">
                                            <div class="alert alert-success mt-3">
                                                Your email is confirmed.<br>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="text-right" style="margin-bottom: 10px; margin-right: 10px;">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <p>If you feel like you have forgotten your password, you can confirm or change it
                                        here:</p>
                                </div>
                                <div>
                                    <a href="{{ route('password.confirm') }}" class="btn btn-success">Confirm
                                        Password</a>
                                    <a href="{{ route('password.request') }}" class="btn btn-info">Reset Password</a>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" rows="5"> Welcom ! </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Wilaya</label>
                                    <select class="custom-select">
                                        <option selected>Bachar</option>
                                        <option>Adrar</option>
                                        <option>Chlef</option>
                                        <option>Naama</option>
                                        <option>Algeria</option>
                                        <option>Tlemcen</option>
                                        <option>Oran</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+0 (213) 0665588914">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" value>
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

    </script>
</body>

</html>
