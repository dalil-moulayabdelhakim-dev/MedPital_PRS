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
                        <div class="col-lg-12 center error-contaner">
                            <h1><span>404</span></h1>
                            <p>Oops!!! Page Not Found</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!--================ start footer Area  =================-->
    @include('layout.footer')
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('layout.script')
</body>

</html>
