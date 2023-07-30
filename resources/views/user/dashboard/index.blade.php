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
                <h4 class="mb-4 text-white">$<span class="counter-value" data-target="0">0</span></h4>
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
                <h4 class="mb-4">$<span class="counter-value" data-target="0">0</span></h4>
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
    <div class="col-md-4">
        <div class="card card-height-100">
            <div class="card-header d-flex">
                <h5 class="card-title mb-0 flex-grow-1">Daily Progress</h5>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown sortble-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted dropdown-title">Today</span> <i class="mdi mdi-chevron-down ms-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item">Today</button>
                            <button class="dropdown-item">This Week</button>
                            <button class="dropdown-item">This Month</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <div id="stroked_radialbar" data-colors='["--tb-primary"]' class="apex-charts" dir="ltr"></div>
                <p class="text-muted mb-0">Very good, keep improving the quality of your learning</p>
            </div>
        </div>
    </div><!--end col-->
</div>
@endsection