@extends('layout.dashboard')
@section('title')
    Welcome Back {{ auth()->user()->username }}
@endsection
@section('content')
    @if (networkCapInPercentage(auth()->user()->id) >= 100)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <h5 class="mb-0 text-success">Total Freeze Balance:
                        ${{ number_format(auth()->user()->freeze_transactions->sum('amount'),2) }}</h5>
                    <h5 class="text-success">Available Balance: ${{ number_format(balance(auth()->user()->id), 2) }}</h5>
                    <h5 class="text-success">Total
                        ${{ number_format(balance(auth()->user()->id) +auth()->user()->freeze_transactions->sum('amount'),2) }}
                    </h5>
                    <p class="mb-3">We Offer you to Use your Freeze Balance to ReInvest or Upgrade Plan</p>
                    <div class="d-flex justify-content-start gap-4 align-items-center">
                        <form action="{{ route('user.plan.networkcap') }}" method="POST">
                            @csrf
                            <button class="btn btn-success">Activate Plan</button>
                        </form>
                        <div class="count-timer">
                            <div id="countdown" data-end="{{ checkFreezeFirstDate(auth()->user()->id) }}">
                            </div>
                            <h4 class="text-success mb-0" id="counter"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card card-body alert alert-success">
                <h3 class="text-success">Promotion 9 OCT 2023 - 16 OCT 2023</h3>
                <p>From October 9th to October 16th, 2023, 11:59 pm, seize the opportunity to own the iconic Honda CD 70
                    bike for just $6000 through a direct sale. Don't miss your chance to ride in style and experience the
                    ultimate journey. Act now and make this limited-time offer yours!</p>
                <h3 class="text-success">Direct Sale Required: $6000</h3>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body bg-dark rounded">
                    <span class="avatar-sm text-white float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4 text-white">$ {{ number_format(balance(auth()->user()->id), 2) }}</h4>
                    <p class=" fw-medium text-uppercase text-success mb-0">Available Balance</p>
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
                    <h4 class="mb-4">$ {{ number_format(totalIncome(auth()->user()->id), 2) }}</h4>
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
                    <h4 class="mb-4">$ {{ number_format(getAllWithdraw(auth()->user()->id), 2) }}</h4>
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
                    <h4 class="mb-4">$ {{ number_format(getTodayWithdraw(auth()->user()->id), 2) }}</h4>
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
                    <h4 class="mb-4">$ {{ number_format(totalRoi(auth()->user()->id), 2) }}</h4>
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
                    <h4 class="mb-4">$ {{ number_format(todayRoi(auth()->user()->id), 2) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Today ROI</p>
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
                    <h4 class="mb-4">$ {{ number_format(totalDirectCommission(auth()->user()->id), 2) }}</h4>
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
                    <h4 class="mb-4 text-danger">$
                        {{ number_format(auth()->user()->freeze_transactions->sum('amount'),2) }}</h4>
                    <p class="text-danger fw-medium text-uppercase mb-0">Total Freeze Balance</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-xl-3 col-md-4">
                        <div
                            class="card-body bg-danger-subtle text-center learning-widgets d-flex align-items-center justify-content-center h-100">
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
                                        <input type="text" id="leftRefer" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="button-addon2"
                                            value="{{ route('register', ['refer' => auth()->user()->username, 'position' => 'left']) }}">
                                        <button onclick="copyInputValue('leftRefer')" class="btn btn-danger"
                                            type="button" id="button-addon2"><i
                                                class="fs-3 mb-0 ph-clipboard-text-light"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="rightRefer">Join on Right Side</label>
                                    <div class="input-group">
                                        <input type="text" id="rightRefer" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="button-addon2"
                                            value="{{ route('register', ['refer' => auth()->user()->username, 'position' => 'right']) }}">
                                        <button onclick="copyInputValue('rightRefer')" class="btn btn-danger"
                                            type="button" id="button-addon2"><i
                                                class="fs-3 mb-0 ph-clipboard-text-light"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress bg-danger-subtle progress-sm rounded-0" data-bs-toggle="tooltip"
                            data-bs-title="100% Completed">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 pb-1">
                        <div class="">
                            <h2 class="card-title">Networking Cap</h6>
                                <p class="text-muted mb-0">
                                    <b>${{ number_format(getActivePlan(auth()->user()->id) * 3, 2) }}</b> Total CAP
                                </p>
                                <p class="text-muted mb-0"> <b>${{ number_format(networkCap(auth()->user()->id), 2) }}</b>
                                    Total Earned</p>
                                <p class="text-muted mb-0">
                                    <b>{{ auth()->user()->refer }}({{ auth()->user()->position }})</b>
                                    Sponser's Username
                                </p>
                        </div>
                    </div>
                    <div class="progress" data-bs-toggle="tooltip"
                        data-bs-title="{{ number_format(networkCapInPercentage(auth()->user()->id)) }}% Reached">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="{{ networkCapInPercentage(auth()->user()->id) }}" aria-valuemin="0"
                            aria-valuemax="100" style="width: {{ networkCapInPercentage(auth()->user()->id) }}%"></div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('user.history.all') }}" class="text-danger">View All Transactions <i
                                class="bi bi-arrow-right align-baseline ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->userPlan == '')
                        <h3 class="text-uppercase">No Active Package</h3>
                        <hr>
                        <div class="row">
                            <a href="{{ route('user.plan.index') }}"
                                class="btn btn-outline-danger mb-2 btn-block">Activate Plan</a>
                        </div>
                        <div class="row">
                            <a href="{{ route('user.deposit.create') }}"
                                class="btn btn-outline-danger mt-1 btn-block">Deposit Fund</a>
                        </div>
                    @else
                        <h3 class="text-uppercase text-danger">{{ auth()->user()->userPlan->plan->name }}</h3>
                        <h3 class="text-uppercase text-danger">${{ number_format(auth()->user()->userPlan->amount, 2) }}
                        </h3>
                        <h5 class="text-uppercase text-danger">Status: {{ auth()->user()->userPlan->status }}</h5>
                        <div class="row">
                            <a href="{{ route('user.history.roi') }}" class="btn btn-success mt-2 btn-block">Profit
                                Statement</a>
                        </div>
                    @endif
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
                            <i class="ph-users-three"></i>
                        </span>
                    </span>
                    <h4 class="mb-4"> {{ myReferrals(auth()->user()->id) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">My Referrals</p>
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
                    <h4 class="mb-4"> {{ leftReferrals(auth()->user()->id) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Left Team</p>
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
                    <h4 class="mb-4">{{ rightReferrals(auth()->user()->id) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Right Team</p>
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
                    <h4 class="mb-4">${{ number_format(getBinaryCommission(auth()->user()->id), 2) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Binary Commission </p>
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
                    <h4 class="mb-4">${{ number_format(BusinessVolume(auth()->user()->id, 'left'), 2) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Left Business Volume </p>
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
                    <h4 class="mb-4">${{ number_format(BusinessVolume(auth()->user()->id, 'right'), 2) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Right Business Volume </p>
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
                    <h4 class="mb-4">${{ number_format(totalMatchingBusiness(auth()->user()->id), 2) }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Matching Business </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h2 class="card-title">Recent Transactions</h2>
                @forelse (auth()->user()->transactions()->latest()->take(10)->get() as $transaction)
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <h4 class="{{ $transaction->sum ? 'text-success' : 'text-danger' }}">
                                        ${{ number_format($transaction->amount, 2) }}</h4>
                                    <h6 class="text-uppercase mb-0">{{ $transaction->type }}</h6>
                                    <p class="text-uppercase mb-0">{{ $transaction->reference }}</p>
                                </div>
                                <div class="text-end">
                                    <h6 class="text-uppercase mb-0">{{ $transaction->created_at }}</h6>
                                    <h6 class="text-uppercase mb-0">{{ $transaction->status ? 'Approved' : 'Pending' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-success">NO Transaction Found</h4>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h2 class="card-title">Pending Deposits</h2>
                @forelse (auth()->user()->pending_tids->take(10) as $tid)
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <h4 class="">
                                        ${{ number_format($tid->amount, 2) }} <br> <small class="fs-6">Fees:
                                            ${{ number_format($tid->fees, 2) }}</small></h4>
                                    <h6 class="text-uppercase mb-0">{{ $tid->type }}</h6>
                                </div>
                                <div class="text-end">
                                    <h6 class="text-uppercase mb-0">{{ $tid->status ? 'Approved' : 'Pending' }}</h6>
                                    <h6 class="text-uppercase mb-0">{{ $tid->created_at }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-success">NO Transaction Found</h4>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @if (networkCapInPercentage(auth()->user()->id) >= 100)
        <script>
            (function() {
                // Get the past date and time in milliseconds
                var pastDateTime = new Date("{{ checkFreezeFirstDate(auth()->user()->id) }}").getTime();

                // Update the counter every second
                var interval = setInterval(function() {
                    var now = new Date().getTime();
                    var timeRemaining = now - pastDateTime;

                    // If the past date has not passed yet
                    if (timeRemaining > 0) {
                        // Calculate days, hours, minutes, and seconds
                        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                        if (days > 14) {
                            document.getElementById('counter').textContent = "Expired";
                        } else {
                            // Update the counter element with the remaining time
                            document.getElementById('counter').textContent = days + 'D ' + hours + 'H ' + minutes +
                                'M ' + seconds + 'S';
                        }

                    } else {
                        clearInterval(interval);
                        document.getElementById('counter').textContent = 'Subscription Expired';
                    }
                }, 1000); // Update every second
            })();
        </script>
    @endif
    <script>
        (function() {
            // Get the past date and time in milliseconds
            var pastDateTime = new Date("2023-09-05 13:42:49").getTime();

            // Update the counter every second
            var interval = setInterval(function() {
                var now = new Date().getTime();
                var timeRemaining = pastDateTime - now;

                // If the past date has not passed yet
                if (timeRemaining > 0) {
                    // Calculate days, hours, minutes, and seconds
                    var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                    if (days > 14) {
                        document.getElementById('promotional').textContent = "Expired";
                    } else {
                        // Update the promotional element with the remaining time
                        document.getElementById('promotional').textContent = days + 'D ' + hours + 'H ' +
                            minutes +
                            'M ' + seconds + 'S';
                    }

                } else {
                    clearInterval(interval);
                    document.getElementById('promotional').textContent = 'Promotion Expired';
                }
            }, 1000); // Update every second
        })();
    </script>
@endsection
