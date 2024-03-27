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

                    <div class="input-box ">
                        <label for="roleSelect" class="details">Role</label>
                        <select id="roleSelect" name="user_type_id" required>
                            @foreach ($user_type as $type)
                                @if ($type->id != 1 && $type->id != 2 && $type->id != 7)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="input-box">
                        <label for="name" class="details">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autocomplete="name" placeholder="Enter your name">
                    </div>

                    <div class="input-box " id="privacyContainer">
                        <label for="privacySelect" class="details">Privacy</label>
                        <select id="privacySelect" name="privacy" required>
                            <option value="1">Public</option>
                            <option value="2">Private</option>
                        </select>
                    </div>

                    <div class="input-box" id="agreementContainer" style="display: none">
                        <label for="agreement_code" class="details">Agreement code</label>
                        <input id="agreement_code" type="text" name="agreement_code"  placeholder="Enter your agreement code" minlength="6">
                    </div>

                    <div class="input-box">
                        <label for="id_card_number" class="details">ID card number</label>
                        <input id="id_card_number" type="text" pattern="[0-9]+" name="id_card_number" required
                            autocomplete="id_card_number" placeholder="Enter your ID card number">
                    </div>

                    <div class="input-box">
                        <label for="phone" class="details">Phone Number</label>
                        <input id="phone" type="tel" pattern="[0-9]{10}" name="phone" required
                            autocomplete="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="input-box">
                        <label for="email" class="details">Email</label>
                        <input id="email" type="email" placeholder="Enter your email" name="email" required
                            autocomplete="email">

                    </div>
                    <div class="input-box " id="specialtyContainer">
                        <label for="specialtySelect" class="details">Specialty</label>
                        <select id="specialtySelect" name="specialty_id" required>
                            <option value="0" selected disabled>Select your Specialty</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="input-box">
                        <label for="password" class="details">Password</label>
                        <input id="password" type="password" name="password" {{-- pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" --}}
                            autocomplete="password" placeholder="Enter your password" required>
                        <div class="tooltip2" id="passwordTooltip">
                            - Requires at least one uppercase letter.<br>
                            - Requires at least one lowercase letter.<br>
                            - Requires at least one digit.<br>
                            - Requires at least one special character.<br>
                            - Requires at least eight characters.
                        </div>
                    </div>


                    <div class="input-box " id="genserContainer">
                        <label for="genderSelect" class="details">Gender</label>
                        <select id="genderSelect" name="gender" required>
                            <option value="0" selected>Select your gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>

                    </div>
                    <div class="input-box">
                        <label for="password_confirmation" class="details">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Confirm your password" required autocomplete="new-password">
                    </div>
                    <div class="input-box">
                        <label for="address" class="details">Address</label>
                        <input id="address" type="text" name="address" placeholder="Enter your address"
                            required>
                    </div>
                    <div class="input-box">
                        <label for="file" class="details">ID cart File</label>
                        <input id="file" type="file" name="id_card_file" accept=".pdf, image/*" required />
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div class="txt-cnt">
                <p>you already have an account? <a href="{{ route('login') }}" class="link">login</a></p>
            </div>
        </div>
    </div>
    @include('auth.layouts.scripts')

</body>

</html>
