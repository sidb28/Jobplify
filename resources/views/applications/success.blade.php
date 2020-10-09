@extends ('app')
@section ('content')

<div class='container'>

	<h1>Congratulations! Your application is on its way to your Recruiter.<br>
	 Please come back later to check for updates!</h1> <br>

	<div class="back-button">
		<a href="{{ route('joblistings.index') }}" class="btn btn-primary btn-lg btn-block">
			Go Back to All Job Listings
		</a>
	</div>

</div>

@endsection