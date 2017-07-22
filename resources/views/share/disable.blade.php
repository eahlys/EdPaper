@extends('layouts/default')

@section('pagetitle') Stop sharing - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Share status for "{{ $doc->title }}"</h2>
	</div><br />
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<p class="text-center"><b>Public link removed for this document</b></p>
		</div>
	</div><br />
	<div class="row text-center">
		<div class="col-sm-offset-4 col-sm-4">
			<a href="/doc/{{ $doc->id }}/share" class="btn btn-success"><i class="fa fa-back"></i> Enable sharing</a>
		</div>
	</div><br/>
	<div class="row text-center">
		<div class="col-sm-offset-4 col-sm-4">
			<a href="/doc/{{ $doc->id }}" class="btn btn-primary"><i class="fa fa-back"></i> Go back</a>
		</div>
	</div>
</div>
@endsection
