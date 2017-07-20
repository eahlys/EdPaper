@extends('layouts/default')

@section('pagetitle') Dashboard - EdPaper @endsection

@section('navbar')
<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
<li class="nav-item"><a href=" /cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href=" /account" class="nav-link">Account</a></li>
<li class="nav-item"><a href=" /logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="col-sm-4">Dashboard</h2>
		<div class="row  col-xs-8 pull-right">
			<form class="form-inline">
				<div class="input-group pull-right col-xs-9">
					<input type="text" name="search" class="form-control" placeholder="Look for a document..." autofocus>
					<span class="input-group-btn">
						<button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<p class="col-xs-4">You have <b>{{ $numberDocs }}</b> document(s)</p>
	</div>


	<div class="row">
		<h4 class="col-xs-10">Latest documents</h4>
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
				<td>{{ $doc->created_at->format('d/m/Y H:i:s') }}</td>
				<td><a href="/{{ $doc->id }}">{{ $doc->title }}</a></td>
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
