<li>
    <span href="#">
        <img class="tree_picture" src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="80">
        <h6 class="mb-0 mt-1 text-uppercase {{ $level > 2 ? 'tree_title' : '' }}">VACANT</h6>
    </span>
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
    <span href="#">
        <img class="tree_picture" src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="80">
        <h6 class="mb-0 mt-1 text-uppercase {{ $level > 2 ? 'tree_title' : '' }}">VACANT</h6>
    </span>
    <ul>
        @if ($level < 3)
            @include('inc.binary_subtree_empty', [
                'subuser' => auth()->user()->right_user,
                'level' => $level + 1,
            ])
        @endif
    </ul>
</li>
