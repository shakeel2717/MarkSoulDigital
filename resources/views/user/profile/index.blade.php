@extends('layout.dashboard')
@section('title', 'Account Setting')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">My Profile</h2>
                    <form action="{{ route('user.profile.store') }}" method="POST">
                        @csrf
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control"
                                        placeholder="Enter Name" value="{{ auth()->user()->fname }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="mname">First Name</label>
                                    <input type="text" name="mname" id="mname" class="form-control"
                                        placeholder="Enter Name" value="{{ auth()->user()->mname }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="lname">First Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control"
                                        placeholder="Enter Name" value="{{ auth()->user()->lname }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter Email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Enter Username" value="{{ auth()->user()->username }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="mobile">Mobile #</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                        placeholder="Enter Mobile" value="{{ auth()->user()->mobile }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="country">Country #</label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        placeholder="Enter Country" value="{{ auth()->user()->country }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="country">Sponser #</label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        placeholder="Sponser Username" value="{{ auth()->user()->refer }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary btn-label"> Update Profile <i
                                    class="ph-arrow-fat-line-right label-icon align-middle fs-lg me-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Update Password</h2>
                    <form action="{{ route('user.profile.password') }}" method="POST">
                        @csrf
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="cpassword">Current Password</label>
                                    <input type="password" name="cpassword" id="cpassword" class="form-control"
                                        placeholder="Enter Current Password" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter New Password" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Enter Confirm New Password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary btn-label"> Update Password <i
                                    class="ph-arrow-fat-line-right label-icon align-middle fs-lg me-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
