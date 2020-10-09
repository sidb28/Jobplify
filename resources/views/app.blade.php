<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Recruitment System</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

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
				{!! Html::linkRoute('home', 'Jobplify', null, array('class'=>'navbar-brand')) !!}
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-left">
					@if (!Auth::guest())
						<li>{!! Html::linkRoute('joblistings.index', 'Job Listings') !!}</li>

						@if(Auth::user()->is_admin == true)
							<li>{!! Html::linkRoute('applications.all', 'All Applications') !!}</li>
						@elseif(Auth::user()->is_recruiter == true)
							<li>{!! Html::linkRoute('applications.all', 'Manage Applications') !!}</li>
						@else	
							<li>{!! Html::linkRoute('applications.all', 'My Applications') !!}</li>
						@endif	

						<li>{!! Html::linkRoute('recruiters.index', 'All Recruiters') !!}</li>

						@if(Auth::user()->is_admin == true)
							<li>{!! Html::linkRoute('admin.user.index', 'All Users') !!}</li>
						@endif

						@if(Auth::user()->is_admin == true)
							<li>{!! Html::linkRoute('interviews.all', 'All Interviews') !!}</li>	
						@else
							<li>{!! Html::linkRoute('interviews.all', 'My Interviews') !!}</li>	
						@endif	
						
						@if(Auth::user()->is_admin == true)
							<li>{!! Html::linkRoute('applications.offers', 'All Offers') !!}</li>
						@elseif(Auth::user()->is_recruiter == true)
							<li>{!! Html::linkRoute('applications.offers', 'Offers Sent') !!}</li>
						@else	
							<li>{!! Html::linkRoute('applications.offers', 'My Job Offers') !!}</li>
						@endif		
					@endif	
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li>{!! Html::linkRoute('getLogin', 'Login') !!}</li>
						<li>{!! Html::linkRoute('getRegister', 'Register') !!}</li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>{!! Html::linkRoute('users.show', 'View Profile', Auth::user()->id, array('class'=>'btn btn-info')) !!}</li>
								<li>{!! Html::linkRoute('users.edit', 'Edit Profile', Auth::user()->id, array('class'=>'btn btn-warning')) !!}</li>
								<li>{!! Html::linkRoute('contactPage', 'Help', null, array('class'=>'btn btn-success')) !!}</li>
								<li>{!! Html::linkRoute('getLogout', 'Logout', null, array('class'=>'btn btn-default')) !!}</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Start Footer Copyright Bar -->
	<footer class="page-footer" style="text-align: center;">
		<div>
			<h5>© 2020 Copyright : Siddhant Bagri</h5>
			<h5><a href="{{ route('contactPage') }}">Contact the developer</a> to report any issues</h5>
		</div>
	</footer>
	<!-- End Footer Copyright Bar -->

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	@yield('js')
</body>
</html>
