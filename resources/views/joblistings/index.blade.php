@extends ('app') 

@section ('content') 
<div class='container'>

	<div class="create-button">
		<a href="{{ route('joblistings.create') }}" class="btn btn-primary btn-lg btn-block">
			Create a new Job Listing
		</a>
		<br>
	</div>
	<h1 style="text-align: center;">All Job Listings on Jobplify</h1>

	@include('partials.joblistings')
</div>
@endsection
