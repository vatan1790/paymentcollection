<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
        <!-- Favicon -->
        <link rel="icon" href="{{ URL::to('/') }}/assets/img/brand/favicon.ico" type="image/x-icon"/>

        <!-- Title -->
        <title>Dashlead -  Admin Panel HTML Dashboard Template</title>

        <!---Fontawesome css-->
        <link href="{{ URL::to('/') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

        <!---Ionicons css-->
        <link href="{{ URL::to('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

        <!---Typicons css-->
        <link href="{{ URL::to('/') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

        <!---Feather css-->
        <link href="{{ URL::to('/') }}/assets/plugins/feather/feather.css" rel="stylesheet">

        <!---Falg-icons css-->
        <link href="{{ URL::to('/') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

        <!---Style css-->
        <link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/assets/css/custom-style.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/assets/css/skins.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/assets/css/dark-style.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/assets/css/custom-dark-style.css" rel="stylesheet">

        
    </head>

    <body  style="background-image: url('<?= url('public/assets/img/SK-bima-background.jpg'); ?>');background-repeat: no-repeat;
    background-size: cover;">
        <!-- Loader -->
        <div id="global-loader">
            <img src="{{ URL::to('/') }}/assets/img/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- End Loader -->


                            <!-- Page -->
        <div class="page main-signin-wrapper">

            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
        <!-- End Page -->

        
        <!-- End Page -->
        <!-- Jquery js-->
        <script src="{{ URL::to('/') }}/assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap js-->
        <script src="{{ URL::to('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Ionicons js-->
        <script src="{{ URL::to('/') }}/assets/plugins/ionicons/ionicons.js"></script>
        
        <!-- Rating js-->
        <script src="{{ URL::to('/') }}/assets/plugins/rating/jquery.rating-stars.js"></script>

        
        <!-- Custom js-->
        <script src="{{ URL::to('/') }}/assets/js/custom.js"></script>



    
    </body>
</html>