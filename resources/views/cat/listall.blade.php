@extends('layouts/default')

@section('pagetitle') Categories - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item active"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Categories</h2>
	</div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<table class="table table-striped table-hover table-sm">
				@if (count($cats) > 0)
				<tbody>	
					@foreach ($cats as $cat)
					<tr>
						<td class="col-xs-10 text-center"><a href="/cat/{{ $cat->id }}">{{ $cat->title }}</a></td>
						<td class="col-xs-1"><a href="/cat/{{ $cat->id }}/edit"><i class="fa fa-edit"></i></a></td>
						<td class="col-xs-1"><a href="/cat/{{ $cat->id }}/delete"><i class="fa fa-trash"></i></a></td>
					</tr>
					@endforeach
				</tbody>
				@else
				<tbody>
					<tr class="text-center">
						<td>
							<i>You haven't created any categories</i>
						</td>
					</tr>
				</tbody>
				@endif
			</table>
			<form class="form-inline" method="POST" action="/cat/add" style="margin-bottom: 10px;">
			{{ csrf_field() }}
				<div class="input-group col-xs-12">
					<input type="text" class="form-control" name="title" id="title" maxlength="20" placeholder="New category...">
					<span class="input-group-btn">
						<button class="btn btn-info" type="submit">Create</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
