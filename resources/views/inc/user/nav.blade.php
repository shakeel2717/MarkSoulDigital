<ul class="navbar-nav" id="navbar-nav">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mt-4">
                <div class="position-relative m-2">
                    <img class="avatar-md rounded-circle" src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="">
                    <img class="avatar-sm position-absolute top-50 start-50" src="{{ asset('assets/images/medal.png') }}" alt="">
                </div>
                <div class="text-white text-uppercase mt-2">{{ auth()->user()->name }}</div>
                <div class="text-white text-uppercase">{{ auth()->user()->status }}</div>
            </div>
        </div>
    </div>
    <li class="menu-title"><span data-key="t-menu">Overview</span></li>
    <li class="nav-item">
        <a href="{{route('user.dashboard.index')}}" class="nav-link menu-link">
            <i class="ph-gauge-light"></i>
            <span data-key="t-calendar">Dashboard</span>
        </a>
    </li>

    <li class="menu-title"><span data-key="t-menu">Finance</span></li>
    <li class="nav-item">
        <a href="{{route('user.deposit.create')}}" class="nav-link menu-link">
            <i class="ph-wallet"></i>
            <span data-key="t-calendar">Deposit</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.withdraw.index')}}" class="nav-link menu-link">
            <i class="ph-wallet"></i>
            <span data-key="t-calendar">Withdrawal</span>
        </a>
    </li>

    <li class="menu-title"><span data-key="t-menu">Pacakge Plans</span></li>
    <li class="nav-item">
        <a href="{{route('user.plan.index')}}" class="nav-link menu-link">
            <i class=" ph-currency-dollar"></i>
            <span data-key="t-calendar">Browse Plans</span>
        </a>
    </li>
    <li class="menu-title"><span data-key="t-menu">MY Tree</span></li>
    <li class="nav-item">
        <a href="{{route('user.tree.index')}}" class="nav-link menu-link">
            <i class="ph-users-three"></i>
            <span data-key="t-calendar">Tree View</span>
        </a>
    </li>
    <li class="menu-title"><span data-key="t-menu">Statement</span></li>
    <li class="nav-item">
        <a href="{{route('user.history.all')}}" class="nav-link menu-link">
            <i class="ph-file-text"></i>
            <span data-key="t-calendar">All Recent Transactions</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.deposits')}}" class="nav-link menu-link">
            <i class="ph-file-text"></i>
            <span data-key="t-calendar">All Deposits</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.roi')}}" class="nav-link menu-link">
            <i class="ph-file-text"></i>
            <span data-key="t-calendar">Daily ROI Transactions</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.withdrawals')}}" class="nav-link menu-link">
            <i class="ph-file-text"></i>
            <span data-key="t-calendar">All Withdrawals</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.direct')}}" class="nav-link menu-link">
            <i class="ph-file-text"></i>
            <span data-key="t-calendar">All Direct Commissions</span>
        </a>
    </li>
</ul>