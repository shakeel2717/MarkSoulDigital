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
                <p class="text-muted fw-medium text-uppercase mb-0">All Users</p>
            </div>
        </div>
    </div>
</div>
@endsection