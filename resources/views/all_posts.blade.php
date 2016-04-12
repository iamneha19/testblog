<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>

		<link href={{ asset('css/app.css') }} rel="stylesheet">

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Laravel</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ asset('/') }}">Home</a></li>
					</ul>
					@if(Auth::check())
						<ul class="nav navbar-nav">
							<li><a href="{{ asset('mypost') }}">My Post</a></li>
						</ul>
					@endif
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ asset('auth/login') }}">Login</a></li>
							<li><a href="{{ asset('auth/register') }}">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ asset('auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@if(count($post)==0){ 
				<div class="col-md-10 col-md-offset-1"><h3>No records found!!</h3></div>
			@else
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width:60px;">Sr No.</th>
                                    <th style="width:158px;">
                                        Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Users
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>@foreach ($post as $data)
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{$data->description }}</td>
                                    <td>{{$data->username }}</td>
                                    <td>{{$data->created_at }}</td>
                                </tr>
								@endforeach
                            </tbody>
						</table>
					</div>
				</div>
			@endif
			@yield('content')
				<!-- Scripts -->
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
		</body>
	</html>