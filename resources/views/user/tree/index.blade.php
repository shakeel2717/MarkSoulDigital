@extends('layout.dashboard')
@section('styles')
<style>
    /*Now the CSS*/
    div,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
    }

    .tree-container {
        width: 1200px;
        overflow-x: auto;
        white-space: nowrap;
        /* Prevent content from wrapping */
    }



    .tree li {
        float: left;
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

    /*Time to add downward connectors from parents*/
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: verdana, tahoma;
        font-size: 10px;
        display: inline-block;
        border-radius: 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover,
    .tree li a:hover+ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }

    /*Connector styles on hover*/
    .tree li a:hover+ul li::after,
    .tree li a:hover+ul li::before,
    .tree li a:hover+ul::before,
    .tree li a:hover+ul ul::before {
        border-color: #94a0b4;
    }

    path {
        fill: rgb(44, 163, 40);
        box-shadow: 5px 2px 10px;
    }
</style>
@endsection
@section('title','Deposit')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body" style="overflow: scroll;">
            <div class="tree-container d-flex justify-content-center">
                <div class="tree">
                    <ul>
                        <li>
                            <a href="#">{{ auth()->user()->name }}</a>
                            <ul>
                                @if (auth()->user()->left_user)
                                @include('inc.binary_subtree', ['subuser' => auth()->user()->left_user])
                                @endif
                                @if (auth()->user()->right_user)
                                @include('inc.binary_subtree', ['subuser' => auth()->user()->right_user])
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