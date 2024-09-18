<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <title>CropSense</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!-- ======== Preloader =========== -->
    <!-- <div id="preloader">
      <div class="spinner"></div>
    </div> -->
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->

    <!-- <div class="overlay"></div> -->
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="">
        <!-- ========== header start ========== -->

        <!-- ========== header end ========== -->

        <!-- ========== signin-section start ========== -->
        <section class="signin-section">
            <div class="container">

                <div class="row ">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10" style="color: green">Welcome </h1>
                                    <p class="text-medium">
                                        Register an account in simple steps
                                    </p>
                                </div>
                                <div class="cover-image">
                                    <!-- <img src="assets/images/auth/signin-image.svg" alt="" /> -->
                                </div>
                                <div class="shape-image">
                                    <img src="assets/images/auth/shape.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="signin-wrapper">
                            <div class="form-wrapper">
                                <h6 class="mb-15">{{ __('Sign Up') }}</h6>

                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>{{ __('Name') }}</label>
                                                <input type="name" placeholder="Name" name="name" required />
                                            </div>
                                        </div>

                                        <!--  -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" placeholder="Email" name="email" required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>{{ __(' Password') }}</label>
                                                <input type="password" placeholder="Password" name="password"
                                                    type="password" required />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>{{ __('Confirm Password') }}</label>
                                                <input type="password" placeholder="Password"
                                                    name="password_confirmation" type="password" required />
                                            </div>
                                        </div>

                                        <!-- end col -->
                                        {{-- <div class="col-xxl-6 col-lg-12 col-md-6">
                                            <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                                <a href="#" class="hover-underline">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div> --}}
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button class="main-btn primary-btn btn-hover w-100 text-center">
                                                    {{ __('Sign Up') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>

                                <div class="singin-option pt-40">

                                    <p class="text-sm text-medium text-dark text-center">
                                      Already have an account?
                                      <a href="{{route('login')}}">Sign in</a>
                                    </p>
                                  </div>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- ========== signin-section end ========== -->

        <!-- ========== footer start =========== -->

        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
