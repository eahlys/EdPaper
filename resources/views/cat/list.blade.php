@extends('layouts/default')

@section('pagetitle') {{ $catName }} - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="col-sm-4">{{ $catName }}</h2>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-xs-2">Uploaded</th>
				<th class="col-xs-10">Title</th>
			</tr>
		</thead>
		@if (count($docs) > 0)
		<tbody>	
			@foreach ($docs as $doc)
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
