@extends('layouts/default')

@section('pagetitle') Account - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href=" /cat" class="nav-link">Categories</a></li>
<li class="nav-item active"><a href=" /account" class="nav-link">Account</a></li>
<li class="nav-item"><a href=" /logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center display-4">Account management</h2>
    </div><br />
    <form class="form-horizontal" role="form" method="POST" action="/account">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control" name="name" maxlength="30" value="{{ $user->name }}" >
            </div>
        </div>
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-mail Address</label>

            <div class="col-md-3">
                <input id="email" type="text" class="form-control" name="email" maxlength="50" value="{{ $user->email }}" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-check-circle"></i> Submit
                </button>
            </div>
        </div>
    </form>
</div>
@endsection