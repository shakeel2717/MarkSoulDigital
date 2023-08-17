@extends('layout.dashboard')
@section('title', 'Account Setting')
@section('content')
    @if (auth()->user()->kyc && auth()->user()->kyc->status == false)
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="alert alert-dark">
                    Your KYC Request is Under Review!
                </div>
            </div>
        </div>
    @elseif (auth()->user()->kyc && auth()->user()->kyc->status == true)
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="alert alert-success">
                    Your KYC Request is Successfully Approved!
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Account Verification</h2>
                    <form action="{{ route('user.kyc.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control"
                                        placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control"
                                        placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="f_name">Father/Husband Name</label>
                                    <input type="text" name="f_name" id="f_name" class="form-control"
                                        placeholder="Enter Father/Husband Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                        placeholder="Enter Full Mobile" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="b_name">Beneficiary Name</label>
                                    <input type="text" name="b_name" id="b_name" class="form-control"
                                        placeholder="Enter Beneficiary Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="b_f_name">Beneficiary Father's Name</label>
                                    <input type="text" name="b_f_name" id="b_f_name" class="form-control"
                                        placeholder="Enter Beneficiary Father's Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="b_mobile">Beneficiary Mobile Number</label>
                                    <input type="text" name="b_mobile" id="b_mobile" class="form-control"
                                        placeholder="Enter Beneficiary Father's Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-danger btn-label"> Submit KYC Request <i
                                    class="ph-arrow-fat-line-right label-icon align-middle fs-lg me-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
