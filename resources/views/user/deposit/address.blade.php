@extends('layout.dashboard')
@section('title','Deposit')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Deposit Funds</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <p><strong>1. </strong>Please Send <strong>${{ number_format($finalAmount,2) }}</strong> to the following address</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="py-2 px-3 border border-dashed rounded">
                            <div class="d-flex align-items-center gap-2">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="fs-md text-truncate"><a href="#!" class="text-reset">Amount</a></h6>
                                    <p class="text-muted mb-0">Amount to be Deposit</p>
                                </div>
                                <div class="text-end">
                                    <h5 class="fs-md text-primary mb-0">${{ number_format($amount,2) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="py-2 px-3 border border-dashed rounded">
                            <div class="d-flex align-items-center gap-2">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="fs-md text-truncate"><a href="#!" class="text-reset">Fees</a></h6>
                                    <p class="text-muted mb-0">Deposit Fees</p>
                                </div>
                                <div class="text-end">
                                    <h5 class="fs-md text-primary mb-0">${{ number_format($fees,2) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="py-2 px-3 border border-dashed rounded">
                            <div class="d-flex align-items-center gap-2">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="fs-md text-truncate"><a href="#!" class="text-reset">Total Amount</a></h6>
                                    <p class="text-muted mb-0">Total Amount (Includd Tax + Charges)</p>
                                </div>
                                <div class="text-end">
                                    <h5 class="fs-md text-primary mb-0">${{ number_format($finalAmount,2) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form action="{{ route('user.deposit.verify') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label for="amount">Wallet Address</label>
                                        <input type="text" name="amount" id="amount" class="form-control text-center" placeholder="Enter Amount" value="{{ $wallet->address }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label for="hash_id">Transaction ID, Hash ID</label>
                                        <input type="text" name="hash_id" id="hash_id" class="form-control" placeholder="Enter Your Hash ID">
                                        <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                                        <input type="hidden" name="amount" value="{{ $amount }}">
                                    <input type="hidden" name="finalAmount" value="{{ $finalAmount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary btn-label"> Send Deposit Request <i class="ph-arrow-fat-line-right label-icon align-middle fs-lg me-2"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{$wallet->address}}&chld=L|1&choe=UTF-8" alt="Address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection