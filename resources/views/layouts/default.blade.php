<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" media="screen" href="/bootstrap.min.css">
	{{-- <link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald">
	<link rel=stylesheet type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	

	<script src="/jquery.js"></script>
	<script src="/bootstrap.min.js"></script>
	<title>@yield('pagetitle')</title>
	<style>
	.navbar-brand, .nav-link{
		font-family:Oswald;
	}
	body {
		margin-top:80px;
	}
	.alert {
		margin-bottom: 10px;
	}
	</style>
	@yield('style')
	@yield('script')
	<nav class="navbar navbar-fixed-top navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">EdPaper</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar" style="max-height:500px;">
				<ul class="nav navbar-nav navbar-right">
					@yield('navbar')
				</ul>
			</div>
		</div>
	</nav>
</head>

<body>
	@yield('content')
</body>
<footer>
<div class="container">
<div class="row">
	<h5 class="text-center"><small><i>Made by Pierre T. - <a href="https://github.com/Edraens">Edraens</a>, 2017</i></small></h5>
</div>
</div><br />
</footer>

</html>
