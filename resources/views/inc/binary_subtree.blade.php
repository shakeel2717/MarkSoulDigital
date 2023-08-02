<a href="#">
    <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Image" width="100">
    <h2 class="card-title">{{ $subuser->name }}</h2>
</a>
<ul>
    @if ($subuser->left_user)
    <li>
        @include('inc.binary_subtree', ['subuser' => $subuser->left_user])
    </li>
    @endif
    @if ($subuser->right_user)
    <li>
        @include('inc.binary_subtree', ['subuser' => $subuser->right_user])
    </li>
    @endif
</ul>