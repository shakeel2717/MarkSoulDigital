@if ($level < 4)
    <li>
        <span href="#" class="{{ $subuser->status == 'active' ? 'border-primary' : 'border-dark' }}">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#TreeDetail{{ $subuser->id }}">
                <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user" width="50">
            </a>
            <a href="{{ route('user.tree.show', ['tree' => $subuser->id]) }}">
                <h6 class="mb-0 mt-3 text-uppercase">{{ $subuser->name }}</h6>
            </a>
        </span>
        @include('inc.tree-detail', ['user' => $subuser->id])
        <ul>
            @if ($subuser->left_user)
                @include('inc.binary_subtree', ['subuser' => $subuser->left_user, 'level' => $level + 1])
            @else
                @include('inc.binary_single_empty', [
                    'subuser' => auth()->user()->right_user,
                    'level' => $level + 1,
                ])
            @endif
            @if ($subuser->right_user)
                @include('inc.binary_subtree', ['subuser' => $subuser->right_user, 'level' => $level + 1])
            @else
                @include('inc.binary_single_empty', [
                    'subuser' => auth()->user()->right_user,
                    'level' => $level + 1,
                ])
            @endif
        </ul>
    </li>
@endif
