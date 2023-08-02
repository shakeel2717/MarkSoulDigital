@extends('layout.dashboard')
@section('title','Withdraw Request')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Withdrawal Funds</h2>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-lg card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="ph-wallet-thin fs-1"></i>
                                    <h4 class="card-title mb-0 ms-2">Available Balance</h4>
                                </div>
                                <h2 class="card-title mb-0">${{ number_format(balance(auth()->user()->id),2) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <p><strong>1. </strong>Select Payment Method</p>
                    </div>
                </div>
                <form action="{{ route('user.withdraw.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        @foreach ($wallets as $wallet)
                        <div class="col-lg-4">
                            <div class="form-check card-radio">
                                <input id="paymentMethod{{$loop->iteration}}" name="paymentMethod" type="radio" value="{{ $wallet->id }}" class="form-check-input" {{ $loop->first ? 'checked' : '' }}>
                                <label class="form-check-label" for="paymentMethod{{$loop->iteration}}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="avatar">
                                            <img src="{{ asset('methods/') }}/{{ $wallet->icon }}" width="40" alt="{{ $wallet->name }}">
                                        </span>
                                        <span class="fs-3xl float-end mt-2 text-wrap d-block fw-semibold">{{$wallet->name}}</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amount">Amount in USD</label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary btn-label"> Withdraw Reqeust <i class="ph-arrow-fat-line-right label-icon align-middle fs-lg me-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection