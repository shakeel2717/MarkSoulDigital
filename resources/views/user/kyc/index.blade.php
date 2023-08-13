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
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="name">Full Legal Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter Name" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Enter Full Address" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-dark">
                                        <div class="text-center">
                                            <img src="{{ asset('front.png') }}" class="mb-3" alt="ID Card"
                                                width="150">
                                        </div>
                                        <div class="form-group">
                                            <label for="front">Front Side</label>
                                            <input type="file" name="front" id="front" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-dark">
                                        <div class="text-center">
                                            <img src="{{ asset('back.png') }}" class="mb-3" alt="ID Card" width="150">
                                        </div>
                                        <div class="form-group">
                                            <label for="back">Back Side</label>
                                            <input type="file" name="back" id="back" class="form-control">
                                        </div>
                                    </div>
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
@endsection
