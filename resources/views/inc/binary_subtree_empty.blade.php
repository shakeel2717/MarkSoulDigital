<li>
    <a href="#">
        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="50">
        <h6 class="mb-0 mt-3 text-uppercase">No Account</h6>
    </a>
    <ul>
        @if ($level < 3)
            @include('inc.binary_subtree_empty', [
                'subuser' => auth()->user()->right_user,
                'level' => $level + 1,
            ])
        @endif
    </ul>
</li>
<li>
    <a href="#">
        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="50">
        <h6 class="mb-0 mt-3 text-uppercase">No Account</h6>
    </a>
    <ul>
        @if ($level < 3)
            @include('inc.binary_subtree_empty', [
                'subuser' => auth()->user()->right_user,
                'level' => $level + 1,
            ])
        @endif
    </ul>
</li>
