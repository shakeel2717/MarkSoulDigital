@extends('layout.auth')
@section('form')
    <div class="card">
        <div class="card-body p-sm-5 m-lg-4">
            <div class="text-center mt-2">
                <h5 class="fs-3xl">Create Free Account</h5>
                <p class="text-muted">Sign Up to {{ env('APP_NAME') }}.</p>
                @if ($refer != null)
                    <p class="text-muted">Sponser: <strong>{{ $refer }}</strong> at
                        <strong>{{ $position }}</strong> Side
                    </p>
                @else
                    <p class="text-danger">You need a Refer Link to Join This Platform</p>
                @endif
            </div>
            <div class="p-2 mt-2">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" placeholder="Full Name"
                                        class="form-control">
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
                            <input type="email" name="email" id="email" placeholder="Enter Email"
                                class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile #</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile"
                                        class="form-control" minlength="11" maxlength="11">
                                    <small>Mobile Format: 03001234567</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" placeholder="United Kingdom"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password"
                                aria-label="Password" aria-describedby="togglePassword">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="refer" value="{{ $refer }}">
                    <input type="hidden" name="position" value="{{ $position }}">
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                        <label class="form-check-label" for="auth-remember-check">I Agree to ther Terms
                            & Conditions</label>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
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
@section('footer')
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            
            const passwordInput = document.getElementById("passwordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>
@endsection
