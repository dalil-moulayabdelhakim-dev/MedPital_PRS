<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('auth.layouts.head')

<body>

@include('popup')
    <div class="homed">
        <a href="{{ route('/') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Home</a>
    </div>
    <div class="register-container">
        <div class="title">Registration</div>

        <div class="content">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="user-details">

                    <div class="input-box">
                        <label for="name" class="details">Full Name</label>
                        <input id="name" type="text" name="name" required autocomplete="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <label for="id_card_number" class="details">ID card number</label>
                        <input id="id_card_number" type="text" pattern="[0-9]+" name="id_card_number" required autocomplete="id_card_number"
                            placeholder="Enter your ID card number">
                    </div>
                    <div class="input-box">
                        <label for="date_of_birth" class="details">Date of birth</label>
                        <input id="date_of_birth" type="date" name="date_of_birth"  required
                            autocomplete="date_of_birth" placeholder="Date of birth">
                    </div>

                    <div class="input-box">
                        <label for="phone" class="details">Phone Number</label>
                        <input id="phone" type="tel" pattern="[0-9]{10}" name="phone"
                            required autocomplete="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="input-box">
                        <label for="" class="details">Email</label>
                        <input id="email" type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email">

                    </div>
                    <div class="input-box ">
                        <label for="genderSelect" class="details">Gender</label>
                        <select id="genderSelect" name="gender" >
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>

                    </div>
                    <div class="input-box">
                        <label for="password" class="details">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="password"
                            placeholder="Enter your password">
                            <div class="tooltip2" id="passwordTooltip">
                                - Requires at least one uppercase letter.<br>
                                - Requires at least one lowercase letter.<br>
                                - Requires at least one digit.<br>
                                - Requires at least one special character.<br>
                                - Requires at least eight characters.
                            </div>
                    </div>
                    <div class="input-box">
                        <label for="password_confirmation" class="details">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Confirm your password" required autocomplete="new-password">
                    </div>
                    <div class="input-box">
                        <label for="address" class="details">Address</label>
                        <input id="address" type="text" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="input-box">
                        <label for="file" class="details">ID cart File</label>
                        <input type="file" name="id_card_file" accept=".pdf, image/*" required />
                    </div>

                    <div class="input-box">
                        <input id="user_type" type="hidden" name="user_type_id" value="1" />
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div class="txt-cnt">
                <p>you already have an account? <a href="{{ route('login') }}" class="link">login</a></p>
            </div>

            <div class="txt-cnt">
                <p>Are you a laboratory member? <a href="{{ route('register.clinic.member') }}" class="link">Singup</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth/valider.js') }}"></script>

</body>

</html>




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
