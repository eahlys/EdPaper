<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
@extends('layouts/default')

@section('pagetitle') Dashboard - EdPaper @endsection

@section('navbar')
<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-11">
			<div class="row">
				<form method="GET" class="form" action="/search">
					<div class="col-xs-10">
						<input type="text" class="form-control" name="query" placeholder="Search for a document..." autofocus="">
					</div>
					<div class="col-xs-2">
						<button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-1">
			<a href="/doc/add" class="btn btn-success pull-right"><i class="fa fa-upload fa-2x"></i></a>
		</div>

	</div>


	<div class="row">
		<h4 class="col-xs-9">Latest documents</h4>
		<div class="col-xs-2">

		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-xs-2">Uploaded</th>
				<th class="col-xs-10">Title</th>
			</tr>
		</thead>
		@if (count($lastDocs) > 0)
		<tbody>	
			@foreach ($lastDocs as $doc)
			<tr>
				<td>{{ $doc->created_at->format('d/m/Y H:i') }}</td>
				<td><a href="/doc/{{ $doc->id }}">{{ $doc->title }}</a></td>
			</tr>
			@endforeach
		</tbody>
		@else
		<tbody>
			<tr class="text-center">
				<td></td>
				<td>
					<i>Nothing to see here</i>
				</td>
			</tr>
		</tbody>
		@endif
	</table>
</div>
@endsection
