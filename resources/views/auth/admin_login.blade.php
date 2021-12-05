<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/backend/images/favicon.ico') }}">

    <title>Easy Ecommerce Admin - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/skin_color.css') }}">

</head>
<body class="hold-transition theme-primary bg-gradient-primary">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <h2 class="text-white">{{__("admin.Get started with Us")}}</h2>
                        <p class="text-white-50">{{__("admin.Sign in to start your session")}}</p>
                    </div>
                    <div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" id="email" name="email"
                                           class="form-control pl-15 bg-transparent text-white plc-white"
                                           placeholder="{{ __("site.Email address") }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i
                                                class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password"
                                           class="form-control pl-15 bg-transparent text-white plc-white"
                                           placeholder="{{ __("site.Password") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox text-white">
                                        <input type="checkbox" id="basic_checkbox_1">
                                        <label for="basic_checkbox_1">{{ __("site.Remember Me") }}</label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="fog-pwd text-right">
                                        <a href="{{ route('password.request') }}" class="text-white hover-info"><i
                                                class="ion ion-locked"></i>{{ __("site.Forgot pwd?") }}</a><br>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">{{ __("site.SIGN IN") }}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <div class="text-center text-white">
                            <p class="mt-20">- {{ __("site.Sign With") }} -</p>
                            <p class="gap-items-2 mb-20">
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-google-plus"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-instagram"></i></a>
                            </p>
                        </div>

                        <div class="text-center">
                            <p class="mt-15 mb-0 text-white">{{ __("site.Dont have an account?") }} <a href="auth_register.html"
                                                                                       class="text ml-5">{{ __("site.Sign Up") }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="{{ asset('assets/backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>

</body>
</html>
