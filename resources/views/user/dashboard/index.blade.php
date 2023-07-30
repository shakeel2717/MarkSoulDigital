@extends('layout.dashboard')
@section('content')
<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Sign Out</button>
</form>
@endsection