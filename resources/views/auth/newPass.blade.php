
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon_old.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="row g-0 justify-content-center bg-body-dark">
            <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
                <!-- Reminder Block -->
                <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url({{ asset('assets/media/photos/photo19.jpg') }});">
                    <div class="row g-0">
                        <div class="col-md-6 order-md-1 bg-body-extra-light">
                            <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                <!-- Header -->
                                <div class="mb-2 text-center">
                                    <a class="link-fx fw-bold fs-1" href="#">
                                        <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                                    </a>
                                    <p class="text-uppercase fw-bold fs-sm text-muted">Password Reminder</p>
                                </div>
                                <!-- END Header -->

                                <!-- Reminder Form -->
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-reminder" action="{{ route('user.redefinirSenha', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-alt" id="password" name="password" placeholder="Nova senha">
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn w-100 btn-hero btn-primary">
                                            <i class="fa fa-fw fa-reply opacity-50 me-1"></i> Redefinir
                                        </button>
                                    </div>
                                </form>
                                <!-- END Reminder Form -->
                            </div>
                        </div>
                        <div class="col-md-6 order-md-0 bg-gd-fruit-op d-flex align-items-center">
                            <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6 text-center">
                                <p class="fs-2 fw-bold text-white mb-0">
                                    Be ready to fail..
                                </p>
                                <p class="fs-3 fw-semibold text-white-75 mb-0">
                                    ..to be able to succeed!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Reminder Block -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!--
  Dashmix JS

  Core libraries and functionality
  webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

<!-- jQuery (required for jQuery Validation plugin) -->
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/op_auth_reminder.min.js') }}"></script>
</body>
</html>
