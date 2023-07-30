@extends('layout.auth')
@section('form')
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
                                <input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password"
                            class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
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
                    <a href="{{ route('login') }}" class="fw-semibold text-secondary text-decoration-underline"> Sign
                        In</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection