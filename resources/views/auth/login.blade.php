@extends('layouts/default')

@section('pagetitle') Connexion - ChatProject @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Accueil</a></li>
<li class="nav-item active"><a href="#" class="nav-link">Connexion</a></li>
<li class="nav-item"><a href="/register" class="nav-link">Inscription</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center display-4">Connexion</h2>
    </div><br />
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Adresse e-mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                {{-- @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif --}}
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Mot de passe</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

               {{--  @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif --}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" checked> Se souvenir de moi
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Connexion
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
