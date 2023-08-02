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
            <i class=" ph-currency-dollar"></i>
            <span data-key="t-calendar">Tree View</span>
        </a>
    </li>
</ul>