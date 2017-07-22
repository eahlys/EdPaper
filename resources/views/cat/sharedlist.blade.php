@extends('layouts/default')

@section('pagetitle') {{ $catTitle }} - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<h2>{{ $catTitle }}</h2>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-xs-2">Shared</th>
				<th class="col-xs-9">Title</th>
				<th class="col-xs-1"></th>
			</tr>
		</thead>
		@if (count($shares) > 0)
		<tbody>	
			<tr>
				@foreach ($shares as $share)
				<td>{{ $share->created_at->format('d/m/Y H:i') }}</td>
				<td>
					<i class="fa fa-link"></i> <a href="/doc/{{ $share->doc->id }}">{{ $share->doc->title }}</a>
					@foreach ($share->doc->categories()->get() as $cat)
					<a href="/cat/{{ $cat->id }}"><span class="badge badge-default">{{ $cat->title }}</span></a>
					@endforeach
				</td>
				<td>
					<a href="/doc/{{ $share->doc->id }}/view" target="_blank"><i class="fa fa-eye"></i></a>  
					<a href="/doc/{{ $share->doc->id }}/download"><i class="fa fa-download"></i></a>
				</td>
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
				<td></td>
			</tr>
		</tbody>
		@endif
	</table>
	<div class="col-sm-8 pull-right">
		{{ $shares->links() }}
	</div>
</div>
@endsection
