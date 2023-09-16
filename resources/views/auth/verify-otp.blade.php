@extends('layout.auth')
@section('form')
    <div class="card">
        <div class="card-body p-sm-5 m-lg-4">
            <div class="text-center mt-2">
                <img src="{{ asset('brands/logo-dark.png') }}" alt="{{ env('APP_NAME') }}" width="200">
                <h5 class="fs-3xl mt-2">2 Factor Authentication</h5>
                <p class="text-muted">We send you One time OTP to your email, Please Provide to continue</p>
            </div>
            <div class="p-2 mt-2">
                <form action="{{ route('verify-otpReq') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="token">6 Characters OTP</label>
                            <input type="text" name="token" id="token" placeholder="Enter Token"
                                class="form-control">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-danger w-100" type="submit">Proceed to Dashboard</button>
                    </div>
                </form>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <button class="btn btn-danger w-100" type="submit">Sign Out</button>
                    </div>
                </form>

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
