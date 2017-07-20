@extends('layouts/default')

@section('pagetitle') EdPaper @endsection

@section('navbar')
<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
<li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
@endsection

@section('content')
<div class="container">
	<div class="jumbotron">
		<h1 class="display-3">EdPaper (WIP Unstable)</h1>
		<p class="lead">EdPaper helps you organizing your paperwork. Seamless and easy.</p>
		<hr class="my-6">
		<p class="lead">
			<a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
			<a class="btn btn-info btn-lg" href="/login" role="button">Login</a>
		</p>
	</div>
</div>
@endsection