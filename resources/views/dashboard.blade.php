@extends('layouts/default')

@section('pagetitle') Dashboard - EdPaper @endsection

@section('navbar')
<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
<li class="nav-item"><a href=" /account" class="nav-link">Account</a></li>
<li class="nav-item"><a href=" /logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<h1>Work in progress, bro.</h1>
</div>
@endsection
