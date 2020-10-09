@extends ('app')
@section ('content')
<div class='container'>

	<div class="back-button">
		<a href="{{ route('recruiters.index') }}" class="btn btn-primary btn-lg btn-block">
			View all Recruiters
		</a>
	</div>

	<h2>{{ $recruiter->name }}</h2>

	<div>
		<p>Created on: {{ $recruiter->createdHuman() }} UTC</p> 
		<p>Last modified: {{ $recruiter->updatedHuman() }}</p> 
		<p>Company Name: {{ $recruiter->company_name }}</p>
		<p>Email: {{ $recruiter->email }}</p>
	</div>
	<a class="mailtoui btn btn-info" href="mailto:{{$recruiter->email}}">
		Contact via Email
	</a>
</div>
@endsection