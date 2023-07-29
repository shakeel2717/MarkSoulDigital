<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body p-sm-5 m-lg-4">
                            <div class="text-center mt-2">
                                <h5 class="fs-3xl">Create Free Account</h5>
                                <p class="text-muted">Sign Up to {{ env('APP_NAME') }}.</p>
                            </div>
                            <div class="p-2 mt-2">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" id="name"
                                                        placeholder="Full Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" id="username"
                                                        placeholder="Username" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Enter Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password"
                                                placeholder="Enter Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" placeholder="Confirm Password"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">I Agree to ther Terms
                                            & Conditions</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                    </div>
                                </form>

                                <div class="text-center mt-2">
                                    <p class="mb-0">
                                        Already have an account ?
                                        <a href="{{ route('register') }}"
                                            class="fw-semibold text-secondary text-decoration-underline"> Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/swiper.init.js') }}"></script>
</body>

</html>
