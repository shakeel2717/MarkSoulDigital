@if ($level < 4) <li>
    <a href="#" class="{{ $subuser->status == 'active' ? 'border-primary' : 'border-dark' }}" data-bs-toggle="modal" data-bs-target="#TreeDetail{{$subuser->id}}">
        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="80">
        <h5 class="mb-0">{{ $subuser->name }}</h5>
    </a>
    @include('inc.tree-detail', ['user' => $subuser->id])
    <ul>
        @if ($subuser->left_user)
        @include('inc.binary_subtree', ['subuser' => $subuser->left_user,'level' => $level + 1])
        @else
        @include('inc.binary_subtree_empty')
        @endif
        @if ($subuser->right_user)
        @include('inc.binary_subtree', ['subuser' => $subuser->right_user,'level' => $level + 1])
        @else
        @include('inc.binary_subtree_empty')
        @endif
    </ul>
    </li>
    @endif