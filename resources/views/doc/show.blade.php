
@extends('layouts/default')

@section('pagetitle') "{{ $doc->title }}" - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('style')
<style>
.pdfobject-container { height: 600px;}
.pdfobject { border: 1px solid #666; }
</style>
@endsection

@section('script')
<script src="/pdfobject.min.js"></script>
<script>PDFObject.embed("/doc/{{ $doc->id }}/view", "#pdfview");</script>
@endsection

@section('content')
<div class="container">
	@if ( count( $errors ) > 0 )
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
		{{ $error }}<br>        
		@endforeach
	</div>
	@endif
	<div class="row">
		<div class="col-xs-5">
			<a href="/doc/{{ $doc->id }}/view" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i><span class="hidden-xs"> View</span></a>
			<a href="/doc/{{ $doc->id }}/download" class="btn btn-success"><i class="fa fa-download"></i><span class="hidden-xs"> Download</span></a>
			<a href="/doc/{{ $doc->id }}/share" class="btn @if ($shared) btn-warning @else btn-primary @endif"><i class="fa fa-link"></i><span class="hidden-xs"> @if ($shared) Shared @else Share @endif</span></a>
		</div>
		<div class="col-xs-1 pull-right">
			<button class="btn btn-danger pull-right" type="button" data-toggle="modal" data-target="#delete" aria-expanded="false" aria-controls="collapse}"><i class="fa fa-trash-o"></i></button>
		</div>
		<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="preview" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="preview" style="word-wrap: break-word;">Delete "{{ $doc->title }}" ?</h4>
					</div>
					<div class="modal-body">Are you sure ? You <b>cannot</b> undo this !</div>
					<div class="modal-footer">
						<a class="btn btn-danger btn-sm" href="/doc/{{ $doc->id }}/delete" role="button">Yes</a>
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-7">
			<h2> @if ($shared) <i class="fa fa-link"></i> @endif {{ $doc->title }}
				@foreach ($doc->categories()->get() as $cat)
				<a href="/cat/{{ $cat->id }}"><span class="badge badge-default">{{ $cat->title }}</span></a>
				@endforeach
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			{{-- <iframe src="/doc/{{ $doc->id }}/view" width="100%" height="500px" scrolling="no"></iframe> --}}
			<div id="pdfview"></div>
		</div>
		<div class="col-sm-4">
			<p class="text-center">Uploaded : {{ $doc->created_at->format('d/m/Y H:i') }}</p>
			<form class="form-horizontal" role="form" method="POST" action="/doc/{{ $doc->id }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('Title') ? ' has-error' : '' }}">
					<label for="name" class="col-md-4 control-label">Title</label>

					<div class="col-md-8">
						<input id="name" type="text" class="form-control" name="title" maxlength="40" value="{{ $doc->title }}" >
					</div>
				</div>
				@if (count($cats) > 0)
				<div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
					<label for="categories" class="col-md-4 control-label">Categories</label>
					<div class="col-md-6">
						@foreach ($cats as $cat)
						<input class="checkbox-inline" type='checkbox' name="catId[]" value="{{ $cat->id }}" @if (in_array($cat->id, $docCats)) checked @endif>{{ $cat->title }}<br>
						@endforeach
					</div>
				</div>
				@endif
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-btn fa-check-circle"></i> Submit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
