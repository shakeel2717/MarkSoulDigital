@extends('layout.dashboard')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/treeflex@2.0.1/dist/css/treeflex.css">
    <style>
        .user-img {
            width: 30px;
        }
        .tf-nc {
            text-align: center;
        }

        @media (max-width: 768px) {

            .tf-tree li {
                padding: 0px 1px;
            }

            .tf-tree .tf-nc,
            .tf-tree .tf-node-content {
                padding: 0;
            }

            .user-img {
                width: 30px;
            }

            .user-title {
                font-size: 10px;
            }

            .tf-nc {
                text-align: center;
                min-width: 30px;
            }

            .level-3-title {
                display: none;
            }
        }
    </style>
@endsection
@section('title', 'Deposit')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <div class="tf-tree d-flex justify-content-sm-start justify-content-md-center">
                    <ul>
                        <li>
                            @php
                                $level = 1;
                            @endphp
                            <span class="tf-nc">
                                <img class="user-img" src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                                    alt="Image">
                                <p class="user-title level-{{ $level }}-title">{{ $user->name }}</p>
                            </span>
                            <ul>
                                @if (auth()->user()->left_user)
                                    @include('inc.binary_subtree', [
                                        'subuser' => $user->left_user,
                                        'level' => 1,
                                    ])
                                @else
                                    @include('inc.binary_single_empty', [
                                        'subuser' => $user->right_user,
                                        'level' => 1,
                                    ])
                                @endif
                                @if (auth()->user()->right_user)
                                    @include('inc.binary_subtree', [
                                        'subuser' => $user->left_user,
                                        'level' => 1,
                                    ])
                                @else
                                    @include('inc.binary_single_empty', [
                                        'subuser' => $user->right_user,
                                        'level' => 1,
                                    ])
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
