<li>
    <a href="#">{{ $subuser->name }}</a>
    <ul>
        @if ($subuser->left_user)
        @include('inc.binary_subtree', ['subuser' => $subuser->left_user])
        @else
        @include('inc.binary_subtree_empty')
        @endif
        @if ($subuser->right_user)
        @include('inc.binary_subtree', ['subuser' => $subuser->right_user])
        @else
        @include('inc.binary_subtree_empty')
        @endif
    </ul>
</li>