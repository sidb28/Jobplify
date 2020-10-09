@extends ('app') 

@section ('content') 

<div class="back-button">
	<a href="{{ route('recruiters.index') }}" class="btn btn-primary btn-lg btn-block">
		View all Recruiters
	</a>
</div>
<div class="back-button">
	<a href="{{ route('joblistings.index') }}" class="btn btn-primary btn-lg btn-block">
		View all Job Listings
	</a>
</div>

<div class="" style="text-align: center; margin: 5%;">
	<h1 style="color: red;">Error! The Job Listing you are trying to delete does not belong to you.</h1>
	<h2>You do not have the right to delete it!</h2>
	<h2>Please contact the <a href="{{ route('contactPage') }}">Administrator</a> if you think it is posted incorrectly or violates any protocols.</h2>
</div>

@endsection