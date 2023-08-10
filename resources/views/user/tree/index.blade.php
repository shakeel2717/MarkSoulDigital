@extends('layout.dashboard')
@section('styles')
    <style>
        .tree ul {
            padding-top: 20px;
            position: relative;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            white-space: nowrap;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 20px;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 20px;
        }

        .tree span {
            /* border: 1px solid #ccc; */
            /* width: 200px; */
            max-width: 200px;
            padding: 5px 10px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;

            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree span:hover,
        .tree span:hover+ul span {
            background: #eee;
            color: #000;
            /* border: 1px solid #94a0b4; */
        }

        .tree span:hover+ul li::after,
        .tree span:hover+ul li::before,
        .tree span:hover+ul::before,
        .tree span:hover+ul ul::before {
            border-color: #eee;
        }
    </style>
@endsection
@section('title', 'Deposit')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body" style="overflow: scroll;">
                <div class="tree-container">
                    <div class="tree">
                        <ul>
                            <li>
                                <span href="#">
                                    <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="Tree user"
                                        width="80">
                                    <h6 class="mb-0 text-uppercase mt-3">{{ $user->name }}</h6>
                                </span>
                                <ul>
                                    @if ($user->left_user)
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
                                    @if ($user->right_user)
                                        @include('inc.binary_subtree', [
                                            'subuser' => $user->right_user,
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
    </div>
@endsection
