<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    <div class="up-cont">
        @include('popup')
        @isset($user)
        @include('modal.email_verifay_modal')
        @endisset
        <!--================Header Menu Area =================-->
        @include('layout.header')
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        @include('layout.home-banner')
        <!--================End Home Banner Area =================-->

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('layout.script')
</body>

</html>
