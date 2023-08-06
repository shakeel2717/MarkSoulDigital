@extends('layout.dashboard')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body bg-dark rounded">
                <span class="avatar-sm text-white float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-wallet"></i>
                    </span>
                </span>
                <h4 class="mb-4 text-white">$ {{ number_format(balance(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Available Balance</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-circle-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(totalIncome(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Income</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-credit-card"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(getAllWithdraw(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Withdrawals</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-credit-card"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(getTodayWithdraw(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Today Withdrawals</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(totalRoi(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total ROI</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(todayRoi(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Today ROI</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-users-three"></i>
                    </span>
                </span>
                <h4 class="mb-4">$ {{ number_format(totalDirectCommission(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Direct Commission</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-x-circle-light"></i>
                    </span>
                </span>
                <h4 class="mb-4 text-danger">$ {{ number_format(auth()->user()->freeze_transactions->sum('amount'),2) }}</h4>
                <p class="text-danger fw-medium text-uppercase mb-0">Total Freeze Balance</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card overflow-hidden">
            <div class="row g-0">
                <div class="col-xl-3 col-md-4">
                    <div class="card-body bg-danger-subtle text-center learning-widgets d-flex align-items-center justify-content-center h-100">
                        <img src="{{ asset('mlm.png') }}" alt="" class="avatar-lg">
                        <img src="{{ asset('mlm.png') }}" alt="" class="effect">
                    </div>
                </div><!--end col-->
                <div class="col-xl-9 col-md-8">
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="badge bg-info-subtle text-info">Your Refer Link</span>
                        </div>
                        <h5 class="text-truncate text-capitalize">
                            Invite Your Friends and Family and Earn Commission
                        </h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="leftRefer">Join on Left Side</label>
                                <div class="input-group">
                                    <input type="text" id="leftRefer" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ route('register',['refer' => auth()->user()->username,'position' => 'left']) }}">
                                    <button onclick="copyInputValue('leftRefer')" class="btn btn-danger" type="button" id="button-addon2"><i class="fs-3 mb-0 ph-clipboard-text-light"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="rightRefer">Join on Right Side</label>
                                <div class="input-group">
                                    <input type="text" id="rightRefer" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ route('register',['refer' => auth()->user()->username,'position' => 'right']) }}">
                                    <button onclick="copyInputValue('rightRefer')" class="btn btn-danger" type="button" id="button-addon2"><i class="fs-3 mb-0 ph-clipboard-text-light"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress bg-danger-subtle progress-sm rounded-0" data-bs-toggle="tooltip" data-bs-title="100% Completed">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 pb-1">
                    <div class="">
                        <h2 class="card-title">Networking Cap</h6>
                            <p class="text-muted mb-0"> <b>${{number_format(getActivePlan(auth()->user()->id) * 3,2)}}</b> Total CAP</p>
                            <p class="text-muted mb-0"> <b>${{number_format(networkCap(auth()->user()->id),2)}}</b> Total Earned</p>
                    </div>
                </div>
                <div class="progress" data-bs-toggle="tooltip" data-bs-title="$234.95 Paid Amount">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ networkCapInPercentage(auth()->user()->id) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ networkCapInPercentage(auth()->user()->id) }}%"></div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.history.all') }}" class="link-effect">View All Transactions <i class="bi bi-arrow-right align-baseline ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4"> {{ myReferrals(auth()->user()->id) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">My Referrals</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4"> {{ leftReferrals(auth()->user()->id) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Left Team</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4">{{ rightReferrals(auth()->user()->id) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Right Team</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <!-- <h4 class="mb-4">{{ myLeftBusiessVolume(auth()->user()->id) }} / {{ leftBusiessVolume(auth()->user()->id) }}</h4> -->
                <h4 class="mb-4">{{ myLeftBusiessVolume(auth()->user()->id) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Left Business Volume </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-bottom border-3 card-animate border-danger">
            <div class="card-body">
                <span class="avatar-sm text-success float-end">
                    <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                        <i class="ph-currency-dollar"></i>
                    </span>
                </span>
                <h4 class="mb-4">{{ myRightBusiessVolume(auth()->user()->id) }}</h4>
                <!-- <h4 class="mb-4">{{ myRightBusiessVolume(auth()->user()->id) }} / {{ rightBusiessVolume(auth()->user()->id) }}</h4> -->
                <p class="text-muted fw-medium text-uppercase mb-0">Right Business Volume </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <h2 class="card-title">Recent Transactions</h2>
            <livewire:user.all-transaction />
        </div>
    </div>
</div>
@endsection