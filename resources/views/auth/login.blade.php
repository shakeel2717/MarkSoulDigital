@extends('layout.auth')
@section('form')
<div class="card">
    <div class="card-body p-sm-5 m-lg-4">
        <div class="text-center mt-5">
            <h5 class="fs-3xl">Welcome Back</h5>
            <p class="text-muted">Sign in to continue to {{ env('APP_NAME') }}.</p>
        </div>
        <div class="p-2 mt-2">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <div class="float-end">
                            <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                password?</a>
                        </div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                </div>
            </form>

            <div class="text-center mt-5">
                <p class="mb-0">
                    Don't have an account ?
                    <a href="{{ route('register') }}" class="fw-semibold text-secondary text-decoration-underline">
                        Create
                        Account</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection