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
                <h4 class="mb-4 text-white">$ {{ number_format(balnace(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Available Balance</p>
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
                <h4 class="mb-4">$ {{ number_format(balnace(auth()->user()->id),2) }}</h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Income</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total Withdrawal</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Marketing Income</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total ROI</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Today ROI</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Total ROI Withdrawal</p>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
                <p class="text-muted fw-medium text-uppercase mb-0">Today ROI Withdrawal</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card card-body">
            <h2 class="card-title">Recent Transactions</h2>
            <livewire:all-transactions />
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 pb-1">
                    <div class="">
                        <h2 class="card-title">Networking Cap</h6>
                            <p class="text-muted mb-0"> <b>$985.32k</b> Total unpaid invoices</p>
                    </div>
                </div>
                <div class="progress" data-bs-toggle="tooltip" data-bs-title="$234.95 Paid Amount">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                </div>
                <div class="mt-4">
                    <a href="apps-ecommerce-seller-overview.html" class="link-effect">View All Transactions <i class="bi bi-arrow-right align-baseline ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection