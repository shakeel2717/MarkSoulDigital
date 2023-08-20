@extends('layout.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">{{ $users->count() - 320 }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">{{ $users->where('status', 'active')->count() - 320 }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Active Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">{{ $users->where('status', 'pending')->count() }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Pending Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">{{ $users->where('status', 'suspend')->count() }}</h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Suspended Users</p>
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
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format($transactions->where('type', 'Deposit')->where('status', true)->sum('amount') - 302547,2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Approved Deposit</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format($transactions->where('type', 'Deposit')->where('status', false)->sum('amount'),2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Pending Deposit</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(totalRealDeposit()  - 138739.49 , 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Real Deposit</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format($transactions->where('type', 'Withdraw')->where('status', false)->sum('amount'),2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Pending Withdrawals</p>
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
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(totalInvestment() - 288150, 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Investment <small>(with Upgrade Amount)</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(totalPinInvestment(), 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total PIN Investment</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(totalRealInvestment() - 127450, 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Real Investment</p>
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
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(totalInvestment() - 288975, 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Total Withdrawals</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(pendingWithdrawals(), 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Pending Withdrawals</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-bottom border-3 card-animate border-danger">
                <div class="card-body">
                    <span class="avatar-sm text-success float-end">
                        <span class="avatar-title bg-primary-subtle text-danger rounded-circle fs-3">
                            <i class="ph-wallet"></i>
                        </span>
                    </span>
                    <h4 class="mb-4">
                        ${{ number_format(approvedWithdrawals() - 61492.87, 2) }}
                    </h4>
                    <p class="text-muted fw-medium text-uppercase mb-0">Approved Withdrawals</p>
                </div>
            </div>
        </div>
    </div>
@endsection
