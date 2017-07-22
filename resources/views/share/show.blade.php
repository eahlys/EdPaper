@extends('layouts/default')

@section('pagetitle') "{{ $share->doc->title }}" - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
@if (Auth::check())
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@else
<li class="nav-item"><a href="#" class="nav-link">Login</a></li>
<li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
@endif
@endsection

@section('style')
<style>
	.pdfobject-container { height: 700px;}
	.pdfobject { border: 1px solid #666; }
</style>
@endsection

@section('script')
<script src="/pdfobject.min.js"></script>
<script>PDFObject.embed("/share/{{ $share->link }}/view", "#pdfview");</script>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-7">
			<h2>{{ $share->doc->title }}</h2>
		</div>
		<div class="col-xs-3 col-sm-offset-2 pull-right">
			<a href="/share/{{ $share->link }}/view" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i><span class="hidden-xs"> View</span></a>
			<a href="/share/{{ $share->link }}/download" class="btn btn-success"><i class="fa fa-download"></i><span class="hidden-xs"> Download</span></a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12"><i>Shared by {{ $share->doc->user->name }}</i></div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="pdfview"></div>
		</div>
	</div>
</div>
@endsection
