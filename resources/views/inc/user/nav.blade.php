<ul class="navbar-nav" id="navbar-nav">
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
            <i class="ph-wallet-thin"></i>
            <span data-key="t-calendar">Deposit</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.withdraw.index')}}" class="nav-link menu-link">
            <i class="ph-wallet-thin"></i>
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
            <i class="ph-users-three-thin"></i>
            <span data-key="t-calendar">Tree View</span>
        </a>
    </li>
    <li class="menu-title"><span data-key="t-menu">Statement</span></li>
    <li class="nav-item">
        <a href="{{route('user.history.deposits')}}" class="nav-link menu-link">
            <i class="ph-users-three-thin"></i>
            <span data-key="t-calendar">All Deposits</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.roi')}}" class="nav-link menu-link">
            <i class="ph-users-three-thin"></i>
            <span data-key="t-calendar">Daily ROI Transactions</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.withdrawals')}}" class="nav-link menu-link">
            <i class="ph-users-three-thin"></i>
            <span data-key="t-calendar">All Withdrawals</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user.history.direct')}}" class="nav-link menu-link">
            <i class="ph-users-three-thin"></i>
            <span data-key="t-calendar">All Direct Commissions</span>
        </a>
    </li>
</ul>